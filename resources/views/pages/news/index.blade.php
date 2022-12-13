@extends('layouts.master')

@section('content')
  <main class="news-screen container">
    <h1 class="news-screen__title">Новости</h1>

    <p class="news-screen__description">В данном разделе представлены все актуальные новости Федерации шахмат Таджикистана, а также мировые знаковые события в области шахмат. Результаты турниров, новые звезды, претенденты на звание лучших – все это вы можете узнать на нашем сайте.</p>

    <div class="cards-list" id="news">
      @foreach ($data->news as $news)
        <article class="news-card">
          <img
            class="news-card__image"
            src="{{ $news->image }}"
            width="300"
            height="169"
            alt="{{ $news->title }}"
            loading="lazy">

          <div class="news-card__inner">
            <time class="news-card__time" datetime="{{ $news->date }}">
              {{ Carbon\Carbon::create($news->date)->isoFormat('DD.MM.YYYY') }}
            </time>

            <h3 class="news-card__title">{{ $news->title }}</h3>
            <div class="news-card__description">
              {!! strip_tags($news->content) !!}
            </div>

            <a class="news-card__button button" href="{{ route('news', $news->slug) }}">
              Подробнее
            </a>
          </div>
        </article>
      @endforeach
    </div>

    <div class="news-screen__pagination">
      {{ $data->news->fragment('news')->links('components.pagination') }}
    </div>
  </main>
@endsection
