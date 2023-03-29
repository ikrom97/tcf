<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TournamentController;
use App\Models\Article;
use App\Models\News;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/news/{slug?}', [PagesController::class, 'news'])->name('news');
Route::get('/tournaments/{slug?}', [PagesController::class, 'tournaments'])->name('tournaments');
Route::get('/ratings', [PagesController::class, 'ratings'])->name('ratings');
Route::get('/articles/{slug?}', [PagesController::class, 'articles'])->name('articles');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');

Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/admin/{path?}/{path2?}/{path3?}', [PagesController::class, 'admin'])->name('admin');

  Route::resource('/tournament', TournamentController::class);

  Route::get('/tournament', [TournamentController::class, 'index']);
  Route::post('/tournament', [TournamentController::class, 'store']);
  Route::get('/tournament/{id}', [TournamentController::class, 'show']);
  Route::post('/tournament/{id}', [TournamentController::class, 'update']);
  Route::delete('/tournament/{id}', [TournamentController::class, 'destroy']);
  Route::post('/tournaments/delete', [TournamentController::class, 'multidelete']);

  Route::get('/api/news', [NewsController::class, 'index']);
  Route::get('/api/news/{news}', [NewsController::class, 'single']);
  Route::post('/api/news', [NewsController::class, 'store']);
  Route::post('/api/news/update', [NewsController::class, 'update']);
  Route::post('/api/news/delete', [NewsController::class, 'destroy']);
});


Route::redirect('/category/turniri/page/{path}', '/tournaments/{slug?}');
Route::redirect('/category/turniri/{path}', '/tournaments/{slug?}');
Route::redirect('/category/novosti', '/news/{slug?}');
Route::redirect('/category/novosti/page/{path}', '/news/{slug?}');
Route::redirect('/category/stati-intervu', '/articles/{slug?}');
Route::redirect('/category/stati-intervu/page/{path}', '/articles/{slug?}');
Route::redirect('/rating', '/ratings');
Route::redirect('/tj/reyting', '/ratings');
Route::redirect('/reyting', '/ratings');
Route::redirect('/en/rating-2', '/ratings');
Route::redirect('/en', '/');
Route::redirect('/author/fedshah/page/2', '/');
Route::redirect('/en/tournaments', '/tournaments/{slug?}');
Route::redirect('/en/federation', '/tournaments/{slug?}');
Route::redirect('/en/media', '/');
Route::redirect('/tj', '/');
Route::redirect('/2018/08/08', '/');
Route::redirect('/2020/06/24', '/');
Route::redirect('/2020/06/16', '/');
Route::redirect('/2019/09', '/');
Route::redirect('/2019/06', '/');
Route::redirect('/2020/12', '/');
Route::redirect('/2018/03', '/');
Route::redirect('/2020/07/20', '/');
Route::redirect('/2017/01/23', '/');
Route::redirect('/2019/02', '/');
Route::redirect('/2019/04', '/');
Route::redirect('/2020/09', '/');
Route::redirect('/2015/07', '/');
Route::redirect('/2017/page/{path}', '/');
Route::redirect('/2018/03/23', '/');
Route::redirect('/2018/10/20', '/');
Route::redirect('/2018/11', '/');
Route::redirect('/2018/page/3', '/');
Route::redirect('/2019/01', '/');
Route::redirect('/2019/01/22', '/');
Route::redirect('/2019/04/08', '/');
Route::redirect('/2020/06', '/');
Route::redirect('/2020/08', '/');
Route::redirect('/2020/page/{path}', '/');
Route::redirect('/2021/03', '/');
Route::redirect('/2022/06', '/');
Route::redirect('/author/sayfiddin', '/');
Route::redirect('/category/turniri/page/5/{path}', '/tournaments');
Route::redirect('/author/fedshah/page/{path}', '/');
Route::redirect('/en/contacts-2', '/contacts');

$news = News::get();

foreach ($news as $new) {
  Route::redirect('/' . $new->slug, '/news/' . $new->slug);
}

$articles = Article::get();

foreach ($articles as $article) {
  Route::redirect('/' . $article->slug, '/articles/' . $article->slug);
}

Route::redirect('/tag/{path}', '/');
Route::redirect('/tj/{path}', '/');
Route::redirect('/category/media/', '/');
Route::redirect('/page/{path}', '/');
Route::redirect('/author/fedshah', '/');
Route::redirect('/en/index.html', '/');
Route::redirect('/author/ilhom', '/');
Route::redirect('/tj/tamos', '/');
Route::redirect('/en/media', '/');
Route::redirect('/2015/page/8', '/');
Route::redirect('/tajikistan-children-s-championship-among-children-2014/nggallery/image/{path}/', '/news/tajikistan-children-s-championship-among-children-2014');
Route::redirect('/chess-olympiad-tromso-2014/nggallery/page/2/slideshow', '/');
Route::redirect('{path}', '/');
Route::redirect('{path}/{path2}', '/');
Route::redirect('{path}/{path2}/{path3}', '/');
Route::redirect('{path}/{path2}/{path3}/{path4}', '/');
