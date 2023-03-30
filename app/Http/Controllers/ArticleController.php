<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  public function index()
  {
    try {
      return Article::latest()->get();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function store(Request $request)
  {
    try {
      $article = Article::create([
        'title' => $request->title,
        'date' => $request->date,
        'body' => $request->body,
      ]);

      if ($request->has('image')) {
        if (!$article->image_id) {
          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $article->slug . '.' . $extension;
          $file->move(public_path('/images/articles/'), $fileName);

          $image = Image::create([
            'title' => $fileName,
            'src' => '/images/articles/' . $fileName,
            'alt' => $article->title,
            'extension' => $extension,
          ]);

          $article->image_id = $image->id;
          $article->update();
        } else {
          $image = Image::find($article->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $article->slug . '.' . $extension;
          $file->move(public_path('/images/articles/'), $fileName);

          $image->title = $fileName;
          $image->src = '/images/articles/' . $fileName;
          $image->alt = $article->title;
          $image->extension = $extension;
          $image->update();
        }
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function show($id)
  {
    try {
      return Article::with('image')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $article = Article::find($id);
      $article->title = $request->title;
      $article->date = $request->date;
      $article->body = $request->body;
      $article->update();

      if ($request->has('image')) {
        if (!$article->image_id) {
          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $article->slug . '.' . $extension;
          $file->move(public_path('/images/articles/'), $fileName);

          $image = Image::create([
            'title' => $fileName,
            'src' => '/images/articles/' . $fileName,
            'alt' => $article->title,
            'extension' => $extension,
          ]);

          $article->image_id = $image->id;
          $article->update();
        } else {
          $image = Image::find($article->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $article->slug . '.' . $extension;
          $file->move(public_path('/images/articles/'), $fileName);

          $image->title = $fileName;
          $image->src = '/images/articles/' . $fileName;
          $image->alt = $article->title;
          $image->extension = $extension;
          $image->update();
        }
      }

      return Article::with('image')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy($id)
  {
    try {
      $article = Article::find($id);

      if ($article->image_id) {
        $image = Image::find($article->image_id);

        file_exists(public_path($image->src))
          && unlink(public_path($image->src));

        $image->delete();
      }

      $article->delete();

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        $article = Article::find($id);

        if ($article->image_id) {
          $image = Image::find($article->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $image->delete();
        }

        $article->delete();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
