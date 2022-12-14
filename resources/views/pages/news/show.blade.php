@extends('layouts.master')

@section('content')
  <main class="news-selected-screen container">
    <h1 class="news-selected-screen__category">Новости</h1>

    <img
      class="news-selected-screen__image"
      src="{{ $data->news->image }}"
      width="600"
      height="340"
      alt="{{ $data->news->title }}"
      loading="lazy">

    <div class="news-selected-screen__right">
      <time class="news-selected-screen__time" datetime="{{ $data->news->date }}">
        {{ Carbon\Carbon::create($data->news->date)->isoFormat('DD.MM.YYYY') }}
      </time>

      <h2 class="news-selected-screen__title">{{ $data->news->title }}</h2>

      <div class="news-selected-screen__body">
        {!! $data->news->content !!}
      </div>

      <a class="news-selected-screen__all" href="{{ route('news') }}">
        Вернуться ко всем новостям
      </a>
    </div>
  </main>
@endsection
