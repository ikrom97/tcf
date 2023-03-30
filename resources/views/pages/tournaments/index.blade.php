@extends('layouts.master')

@section('content')
  <main class="tournaments-screen container">
    <h1 class="visually-hidden">Турниры</h1>

    @if (count($data->upcoming) > 0)
      <section class="tournaments-screen__upcoming-tournaments upcoming-tournaments">
        <h2 class="upcoming-tournaments__title">Предстоящие турниры</h2>

        <p class="upcoming-tournaments__description">
          Для увеличения интереса к шахматам как среди подрастающего поколения, так и среди взрослых людей, Федерация шахмат Таджикистана планирует и дальше проводить турниры и другие мероприятия. Это позволит постоянно развиваться, повышать уровень игроков для дальнейшего участия в Международных турнирах.
        </p>

        <div class="cards-list">
          @foreach ($data->upcoming as $tournament)
            <x-tournament-card class="tournaments-card--new" :tournament="$tournament" />
          @endforeach
        </div>
      </section>
    @endif

    <section class="tournaments-screen__previous-tournaments previous-tournaments">
      <h2 class="previous-tournaments__title">Предыдущие турниры</h2>
      <p class="previous-tournaments__description">На регулярной основе Федерация шахмат Таджикистана проводит турниры среди начинающих и опытных шахматистов страны, стараясь охватывать самый широкий пласт спортсменов. Подобного рода мероприятия помогают развитию шахмат и увеличивают интерес к этой интеллектуальной игре.</p>

      <div class="cards-list" id="tournaments">
        @foreach ($data->previous as $tournament)
          <x-tournament-card :tournament="$tournament" />
        @endforeach
      </div>

      <div class="tournaments-screen__pagination">
        {{ $data->previous->fragment('tournaments')->links('components.pagination') }}
      </div>
    </section>
  </main>
@endsection
