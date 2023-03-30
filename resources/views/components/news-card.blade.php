@props(['news'])

<article class="news-card">
  <img class="news-card__image" src="{{ $data->news->image ? $data->news->image->src : '' }}" width="300" height="169" alt="{{ $news->title }}" loading="lazy">

  <div class="news-card__inner">
    <time class="news-card__time" datetime="{{ $news->date }}">
      {{ Carbon\Carbon::create($news->date)->isoFormat('DD.MM.YYYY') }}
    </time>

    <h3 class="news-card__title">{{ $news->title }}</h3>
    <div class="news-card__description">
      {{ strip_tags($news->body) }}
    </div>

    <a class="news-card__button button" href="{{ route('news', $news->slug) }}">Подробнее</a>
  </div>
</article>
