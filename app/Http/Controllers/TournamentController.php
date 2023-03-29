<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
  public function index()
  {
    try {
      return Tournament::latest()->get();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function store(Request $request)
  {
    try {
      $tournament = Tournament::create([
        'title' => $request->title,
        'date' => $request->date,
        'body' => $request->body,
      ]);

      if ($request->has('image')) {
        $file = $request->file('image');
        $extension = $file->extension();
        $fileName = $tournament->slug . '.' . $extension;
        $file->move(public_path('/images/tournaments/'), $fileName);

        $image = Image::create([
          'title' => $fileName,
          'src' => '/images/tournaments/' . $fileName,
          'alt' => $tournament->title,
          'extension' => $extension,
        ]);

        $tournament->image_id = $image->id;
        $tournament->update();
      }

      return response(['message' => 'Турнир сохранен'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function show($id)
  {
    try {
      return Tournament::with('image')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $tournament = Tournament::find($id);
      $tournament->title = $request->title;
      $tournament->date = $request->date;
      $tournament->body = $request->body;
      $tournament->update();

      if ($request->has('image')) {
        if (!$tournament->image_id) {
          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $tournament->slug . '.' . $extension;
          $file->move(public_path('/images/tournaments/'), $fileName);

          $image = Image::create([
            'title' => $fileName,
            'src' => '/images/tournaments/' . $fileName,
            'alt' => $tournament->title,
            'extension' => $extension,
          ]);

          $tournament->image_id = $image->id;
          $tournament->update();
        } else {
          $image = Image::find($tournament->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $file = $request->file('image');
          $extension = $file->extension();
          $fileName = $tournament->slug . '.' . $extension;
          $file->move(public_path('/images/tournaments/'), $fileName);

          $image->title = $fileName;
          $image->src = '/images/tournaments/' . $fileName;
          $image->alt = $tournament->title;
          $image->extension = $extension;
          $image->update();
        }
      }

      return Tournament::with('image')->find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy($id)
  {
    try {
      $tournament = Tournament::find($id);

      if ($tournament->image_id) {
        $image = Image::find($tournament->image_id);

        file_exists(public_path($image->src))
          && unlink(public_path($image->src));

        $image->delete();
      }

      $tournament->delete();

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        $tournament = Tournament::find($id);

        if ($tournament->image_id) {
          $image = Image::find($tournament->image_id);

          file_exists(public_path($image->src))
            && unlink(public_path($image->src));

          $image->delete();
        }

        $tournament->delete();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
