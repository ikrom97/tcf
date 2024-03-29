@extends('layouts.master')

@section('content')
  <main class="articles-selected-screen container">
    <h1 class="articles-selected-screen__category">Статьи</h1>

    <img
      class="articles-selected-screen__image"
      src="{{ asset($data->article->image ? $data->article->image->src : '') }}"
      width="600"
      height="340"
      alt="{{ $data->article->title }}"
      loading="lazy">

    <div class="articles-selected-screen__right">
      <time class="articles-selected-screen__time" datetime="{{ $data->article->date }}">
        {{ Carbon\Carbon::create($data->article->date)->isoFormat('DD.MM.YYYY') }}
      </time>

      <h2 class="articles-selected-screen__title">{{ $data->article->title }}</h2>

      <div class="articles-selected-screen__body">{!! $data->article->body !!}</div>

      <a class="articles-selected-screen__all" href="{{ route('articles') }}">
        Вернуться ко всем статьям
      </a>
    </div>
  </main>
@endsection
