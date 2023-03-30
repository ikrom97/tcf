@props(['article'])

<article class="articles-card">
  <img class="articles-card__image" src="{{ $data->article->image ? $data->article->image->src : '' }}" width="300" height="169" alt="{{ $article->title }}" loading="lazy">

  <div class="articles-card__inner">
    <time class="articles-card__time" datetime="{{ $article->date }}">
      {{ Carbon\Carbon::create($article->date)->isoFormat('DD.MM.YYYY') }}
    </time>

    <h3 class="articles-card__title">{{ $article->title }}</h3>

    <div class="articles-card__description">{!! strip_tags($article->body) !!}</div>

    <a class="articles-card__button button" href="{{ route('articles', $article->slug) }}">
      Подробнее
    </a>
  </div>
</article>
