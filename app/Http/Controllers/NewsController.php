<?php

namespace App\Http\Controllers;

use App\Models\News;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    try {
      $news = News::latest()->get();

      return response($news, 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function single(News $news)
  {
    return $news;
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'image' => 'required',
      'date' => 'required',
    ]);

    $slug = SlugService::createSlug(News::class, 'slug', $request->title);

    $image = '';
    if ($request->has('image')) {
      $file = $request->file('image');
      $fileName = $slug . '.' . $file->extension();
      $file->move(public_path('/images/news/'), $fileName);
      $image = '/images/news/' . $fileName;
    }

    $file = NULL;
    if ($request->has('file')) {
      $file = $request->file('file');
      $fileName = $slug . '.' . $file->extension();
      $file->move(public_path('/files/news/'), $fileName);
      $file = '/files/news/' . $fileName;
    }

    try {
      $news = News::create([
        'title' => $request->title,
        'slug' => $slug,
        'date' => $request->date,
        'image' => $image,
        'thumb_image' => $image,
        'content' => $request->content,
        'file' => $file,
      ]);

      return response([
        'News' => $news,
        'message' => 'Турнир успешно добавлен'
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'date' => 'required',
    ]);

    $news = News::find($request->id);
    $news->title = $request->title;

    if ($request->file('image')) {
      file_exists(public_path($news->image)) &&
        unlink(public_path($news->image));

      $file = $request->file('image');
      $fileName = $news->slug . '.' . $file->extension();
      $file->move(public_path('images/news'), $fileName);
      $news->image = '/images/news/' . $fileName;
      $news->thumb_image = '/images/news/' . $fileName;
    }

    if ($request->file('file')) {
      $news->file && file_exists(public_path($news->file)) &&
        unlink(public_path($news->file));

      $file = $request->file('file');
      $fileName = $news->slug . '.' . $file->extension();
      $file->move(public_path('files/news'), $fileName);
      $news->file = '/files/news/' . $fileName;
    }

    $news->date = $request->date;
    $news->content = $request->content;
    $update = $news->update();

    if ($update) {
      return response([
        'message' => 'Данные успешно сохранены',
        'news' => $news,
      ], 200);
    }

    return response(['error' => 'Перепроверьте данные'], 400);
  }

  public function destroy()
  {
    try {
      foreach ((array) request('IDs') as $id) {
        $news = News::find($id);
        if ($news->image && file_exists(public_path($news->image))) {
          unlink(public_path($news->image));
        }
        if ($news->file && file_exists(public_path($news->file))) {
          unlink(public_path($news->file));
        }

        $news->delete();
      }

      return response(['message' => 'Операция прошла успешно.'], 200);
    } catch (\Throwable $th) {
      return response([
        'message' => 'Что то пошло не так попробуйте позже.',
        'error' => $th,
      ], 400);
    }
  }
}
