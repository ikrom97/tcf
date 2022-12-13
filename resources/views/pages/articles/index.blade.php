@extends('layouts.master')

@section('content')
  <main class="articles-screen container">
    <h1 class="articles-screen__title">Статьи</h1>

    <p class="articles-screen__description">В разделе мы собрали все возможные нюансы правил игры в шахматы, в статьях будем рассматривать интересные партии, необычные и сложные ситуации в шахматах. Здесь вы можете расширить свои знания в области шахмат и почерпнуть много нового.</p>

    <div class="cards-list" id="articles">
      @foreach ($data->articles as $article)
        <article class="articles-card">
          <img
            class="articles-card__image"
            src="{{ $article->thumb_image }}"
            width="300"
            height="169"
            alt="{{ $article->title }}"
            loading="lazy">

          <div class="articles-card__inner">
            <time class="articles-card__time" datetime="{{ $article->date }}">
              {{ Carbon\Carbon::create($article->date)->isoFormat('DD.MM.YYYY') }}
            </time>

            <h3 class="articles-card__title">{{ $article->title }}</h3>

            <div class="articles-card__description">{!! strip_tags($article->content) !!}</div>

            <a
              class="articles-card__button button"
              href="{{ route('articles', $article->slug) }}">
              Подробнее
            </a>
          </div>
        </article>
      @endforeach
    </div>

    <div class="articles-screen__pagination">
      {{ $data->articles->fragment('articles')->links('components.pagination') }}
    </div>
  </main>
@endsection
