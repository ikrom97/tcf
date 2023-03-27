<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
  public function index()
  {
    try {
      $tournaments = Tournament::latest()->get();

      return response($tournaments, 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function single(Tournament $tournament)
  {
    return $tournament;
  }

  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'image' => 'required',
      'date' => 'required',
    ]);

    $slug = SlugService::createSlug(Tournament::class, 'slug', $request->title);

    $image = '';
    if ($request->has('image')) {
      $file = $request->file('image');
      $fileName = $slug . '.' . $file->extension();
      $file->move(public_path('/images/tournaments/'), $fileName);
      $image = '/images/tournaments/' . $fileName;
    }

    $file = NULL;
    if ($request->has('file')) {
      $file = $request->file('file');
      $fileName = $slug . '.' . $file->extension();
      $file->move(public_path('/files/tournaments/'), $fileName);
      $file = '/files/tournaments/' . $fileName;
    }

    try {
      $tournament = Tournament::create([
        'title' => $request->title,
        'slug' => $slug,
        'date' => $request->date,
        'image' => $image,
        'thumb_image' => $image,
        'content' => $request->content,
        'file' => $file,
      ]);

      return response([
        'tournament' => $tournament,
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

    $tournament = Tournament::find($request->id);
    $tournament->title = $request->title;

    if ($request->file('image')) {
      file_exists(public_path($tournament->image)) &&
        unlink(public_path($tournament->image));

      $file = $request->file('image');
      $fileName = $tournament->slug . '.' . $file->extension();
      $file->move(public_path('images/tournaments'), $fileName);
      $tournament->image = '/images/tournaments/' . $fileName;
      $tournament->thumb_image = '/images/tournaments/' . $fileName;
    }

    if ($request->file('file')) {
      file_exists(public_path($tournament->file)) &&
        unlink(public_path($tournament->file));

      $file = $request->file('file');
      $fileName = $tournament->slug . '.' . $file->extension();
      $file->move(public_path('files/tournaments'), $fileName);
      $tournament->file = '/files/tournaments/' . $fileName;
    }

    $tournament->date = $request->date;
    $tournament->content = $request->content;
    $update = $tournament->update();

    if ($update) {
      return response([
        'message' => 'Данные успешно сохранены',
        'tournament' => $tournament,
      ], 200);
    }

    return response(['error' => 'Перепроверьте данные'], 400);
  }

  public function destroy()
  {
    try {
      foreach ((array) request('IDs') as $id) {
        $tournament = Tournament::find($id);
        if ($tournament->image && file_exists(public_path($tournament->image))) {
          unlink(public_path($tournament->image));
        }
        if ($tournament->file && file_exists(public_path($tournament->file))) {
          unlink(public_path($tournament->file));
        }

        $tournament->delete();
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
