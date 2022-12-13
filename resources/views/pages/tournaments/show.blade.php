@extends('layouts.master')

@section('content')
  <main class="tournaments-selected-screen container">
    <h1 class="tournaments-selected-screen__category">Предыдущие турниры</h1>

    <img
      class="tournaments-selected-screen__image"
      src="{{ $data->tournament->image }}"
      width="600"
      height="340"
      alt="{{ $data->tournament->title }}"
      loading="lazy">

    <div class="tournaments-selected-screen__right">
      <time class="tournaments-selected-screen__time" datetime="{{ $data->tournament->date }}">
        {{ Carbon\Carbon::create($data->tournament->date)->isoFormat('DD.MM.YYYY') }}
      </time>

      <h2 class="tournaments-selected-screen__title">{{ $data->tournament->title }}</h2>

      <div class="tournaments-selected-screen__body">
        {!! $data->tournament->content !!}
      </div>

      <a class="tournaments-selected-screen__all" href="{{ route('tournaments') }}">
        Вернуться ко всем турнирам
      </a>
    </div>
  </main>
@endsection
