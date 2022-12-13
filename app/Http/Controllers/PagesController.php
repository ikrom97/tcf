<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use App\Models\Player;
use App\Models\Tournament;
use DateTime;
use Illuminate\Http\Request;
use stdClass;

class PagesController extends Controller
{
  public function home()
  {
    $currentDate = new DateTime();
    $data = new stdClass();

    $data->tournaments = Tournament::where('date', '<', $currentDate)
      ->orderBy('date', 'desc')
      ->paginate(10);

    $data->players = Player::where('global', true)
      ->orderBy('rating', 'desc')
      ->orderBy('rank', 'desc')
      ->orderBy('name', 'desc')
      ->take(10)
      ->get();

    $data->news = News::where('date', '<', $currentDate)
      ->orderBy('date', 'desc')
      ->paginate(10);

    return view('pages.home.index', compact('data'));
  }

  public function about()
  {
    return view('pages.about.index');
  }

  public function news(Request $request)
  {
    $data = new stdClass();

    if ($request->slug) {
      $data->news = News::where('slug', $request->slug)->first();
      return view('pages.news.show', compact('data'));
    }

    $data->news = News::orderBy('date', 'desc')
      ->paginate(16);

    return view('pages.news.index', compact('data'));
  }

  public function tournaments(Request $request)
  {
    $data = new stdClass();
    $currentDate = new DateTime();

    if ($request->slug) {
      $data->tournament = Tournament::where('slug', $request->slug)->first();

      return view('pages.tournaments.show', compact('data'));
    }

    $data->upcoming = Tournament::where('date', '>', $currentDate)
      ->orderBy('date', 'asc')
      ->get();

    $data->previous = Tournament::where('date', '<', $currentDate)
      ->orderBy('date', 'desc')
      ->paginate(8);

    return view('pages.tournaments.index', compact('data'));
  }

  public function ratings()
  {
    $data = new stdClass();

    $data->global_rating = Player::where('global', true)
      ->orderBy('rating', 'desc')
      ->orderBy('rank', 'desc')
      ->orderBy('name', 'desc')
      ->get();

    $data->local_rating = Player::where('global', false)
      ->orderBy('rating', 'desc')
      ->orderBy('rank', 'desc')
      ->orderBy('name', 'desc')
      ->get();

    $data->players = PLayer::get();

    return view('pages.ratings.index', compact('data'));
  }

  public function articles(Request $request)
  {
    $data = new stdClass();

    if ($request->slug) {
      $data->article = Article::where('slug', $request->slug)->first();
      return view('pages.articles.show', compact('data'));
    }

    $data->articles = Article::orderBy('date', 'desc')->paginate(16);

    return view('pages.articles.index', compact('data'));
  }

  public function contacts()
  {
    return view('pages.contacts.index');
  }
}
