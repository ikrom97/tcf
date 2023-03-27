<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
  public function index()
  {
    try {
      $tournaments = Tournament::get();
      
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
    return 'store';
  }

  public function update(Request $request)
  {
    return 'update';
  }

  public function destroy(Tournament $tournament)
  {
    return 'destroy';
  }
}
