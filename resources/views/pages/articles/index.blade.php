@extends('layouts.master')

@section('content')
  <main class="articles-screen container">
    <h1 class="articles-screen__title">Статьи</h1>

    <p class="articles-screen__description">В разделе мы собрали все возможные нюансы правил игры в шахматы, в статьях будем рассматривать интересные партии, необычные и сложные ситуации в шахматах. Здесь вы можете расширить свои знания в области шахмат и почерпнуть много нового.</p>

    <div class="cards-list" id="articles">
      @foreach ($data->articles as $article)
        <x-article-card :article="$article" />
      @endforeach
    </div>

    <div class="articles-screen__pagination">
      {{ $data->articles->fragment('articles')->links('components.pagination') }}
    </div>
  </main>
@endsection
