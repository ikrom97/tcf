@extends('layouts.master')

@section('content')
  <main class="news-screen container">
    <h1 class="news-screen__title">Новости</h1>

    <p class="news-screen__description">В данном разделе представлены все актуальные новости Федерации шахмат Таджикистана, а также мировые знаковые события в области шахмат. Результаты турниров, новые звезды, претенденты на звание лучших – все это вы можете узнать на нашем сайте.</p>

    <div class="cards-list" id="news">
      @foreach ($data->news as $news)
        <x-news-card :news="$news" />
      @endforeach
    </div>

    <div class="news-screen__pagination">
      {{ $data->news->fragment('news')->links('components.pagination') }}
    </div>
  </main>
@endsection
