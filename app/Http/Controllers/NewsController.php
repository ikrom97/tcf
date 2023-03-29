<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    try {
      return News::latest()->get();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function store(Request $request)
  {
    try {
      $news = News::create([
        'title' => $request->title,
        'date' => $request->date,
        'body' => $request->body,
      ]);

      if ($request->has('image')) {
        $file = $request->file('image');
        $extension = $file->extension();
        $fileName = $news->slug . '.' . $extension;
        $file->move(public_path('/images/news/'), $fileName);

        $image = Image::create([
          'title' => $fileName,
          'src' => '/images/news/' . $fileName,
          'alt' => $news->title,
          'extension' => $extension,
        ]);

        $news->image_id = $image->id;
        $news->update();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function show($id)
  {
    try {
      return News::with('image')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $news = News::find($id);
      $news->title = $request->title;
      $news->date = $request->date;
      $news->body = $request->body;
      $news->update();

      if ($request->has('image')) {
        if (!$news->image_id) {
          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $news->slug . '.' . $extension;
          $file->move(public_path('/images/news/'), $fileName);

          $image = Image::create([
            'title' => $fileName,
            'src' => '/images/news/' . $fileName,
            'alt' => $news->title,
            'extension' => $extension,
          ]);

          $news->image_id = $image->id;
          $news->update();
        } else {
          $image = Image::find($news->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $news->slug . '.' . $extension;
          $file->move(public_path('/images/news/'), $fileName);

          $image->title = $fileName;
          $image->src = '/images/news/' . $fileName;
          $image->alt = $news->title;
          $image->extension = $extension;
          $image->update();
        }
      }

      return News::with('image')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy($id)
  {
    try {
      $news = News::find($id);

      if ($news->image_id) {
        $image = Image::find($news->image_id);

        file_exists(public_path($image->src))
          && unlink(public_path($image->src));

        $image->delete();
      }

      $news->delete();

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        $news = News::find($id);

        if ($news->image_id) {
          $image = Image::find($news->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $image->delete();
        }

        $news->delete();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
