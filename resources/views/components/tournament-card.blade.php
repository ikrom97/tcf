@props(['tournament', 'class' => ''])

<article class="tournaments-card {{ $class }}">
  <img class="tournaments-card__image" src="{{ asset($tournament->image ? $tournament->image->src : '') }}" alt="{{ $tournament->title }}" width="300" height="169" loading="lazy">
  <div class="tournaments-card__inner">
    <time class="tournaments-card__time" datetime="{{ $tournament->date }}">
      {{ Carbon\Carbon::create($tournament->date)->isoFormat('DD.MM.YYYY') }}
    </time>
    <h3 class="tournaments-card__title">{{ $tournament->title }}</h3>
    <div class="tournaments-card__description">
      {!! strip_tags($tournament->body) !!}
    </div>
    <a class="tournaments-card__more" href="{{ route('tournaments', $tournament->slug) }}">Подробнее</a>
  </div>
</article>
