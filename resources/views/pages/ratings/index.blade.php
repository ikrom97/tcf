@extends('layouts.master')

@section('content')
  <main class="ratings-screen container">
    <h1 class="ratings-screen__title">Рейтинг</h1>

    <p class="ratings-screen__description">Шахматный рейтинг ФИДЕ от Международной шахматной федерации составляется ежемесячно. Топ лучших игроков основан на системе рейтинга Эло. Он вычисляется по результатам игр шахматистов друг с другом. Система рейтингов делит шахматистов на 9 классов: высший класс начинается с рейтинга 2600, низший – 1200 и ниже.</p>

    <form class="ratings-screen__search-form search-form">
      <label class="search-form__label">
        <input
          class="search-form__input"
          type="search"
          name="search"
          placeholder="Введите запрос поиска игрока"
          value="">
      </label>
      <textarea class="visually-hidden" name="players">{{ json_encode($data->players) }}</textarea>
      <button class="search-form__submit" type="submit">
        <svg class="search-form__icon" width="14" height="14">
          <use xlink:href="#search"></use>
        </svg>
        Найти
      </button>
    </form>

    <div class="search-result"></div>

    <div data-section="ratings">
      <section class="rating-section">
        <h2 class="rating-section__title">
          Топ 100 игроков на {{ Carbon\Carbon::create(date('Y M', strtotime('- 1 month')))->isoFormat('MMMM Y') }}
        </h2>

        <ol class="players-list">
          @foreach ($data->global_rating as $key => $player)
            <li class="players-list__item {{ $key > 11 ? 'visually-hidden' : '' }}">
              <div class="players-card">
                <img
                  class="players-card__image"
                  src="{{ $player->avatar }}"
                  alt="{{ $player->name }}"
                  width="120"
                  height="185"
                  loading="lazy">

                <div class="players-card__inner">
                  <h3 class="players-card__name">
                    <span>{{ explode(' ', $player->name)[0] }},</span>
                    {{ explode(' ', $player->name)[1] }}
                  </h3>

                  <dl class="players-card__details">
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Рейтинг:</dt>
                      <dd class="players-card__detail-definition">{{ $player->rating }}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Ранг:</dt>
                      <dd class="players-card__detail-definition">{{ $player->rank }}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Титул:</dt>
                      <dd class="players-card__detail-definition">{{ $player->title }}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="visually-hidden">Страна</dt>
                      <dd class="players-card__detail-definition">
                        <img
                          class="players-card__country"
                          src="{{ $player->flag }}"
                          alt="United States"
                          width="80"
                          height="56">
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
            </li>
          @endforeach
        </ol>

        <button class="rating-section__button">
          Показать еще <span>12</span>
          <svg class="rating-section__button-icon" width="6" height="10">
            <use xlink:href="#arrow"></use>
          </svg>
        </button>
      </section>

      <section class="rating-section">
        <h2 class="rating-section__title">Топ активных таджикских игроков на {{ date('Y') }}</h2>

        <ol class="players-list">
          @foreach ($data->local_rating as $key => $player)
            <li class="players-list__item {{ $key > 11 ? 'visually-hidden' : '' }}">
              <div class="players-card">
                <img
                  class="players-card__image"
                  src="{{ $player->avatar }}"
                  alt="{{ $player->name }}"
                  width="120"
                  height="185"
                  loading="lazy">

                <div class="players-card__inner">
                  <h3 class="players-card__name">
                    <span>{{ explode(' ', $player->name)[0] }},</span>
                    {{ explode(' ', $player->name)[1] }}
                  </h3>

                  <dl class="players-card__details">
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Рейтинг:</dt>
                      <dd class="players-card__detail-definition">{{ $player->rating }}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Ранг:</dt>
                      <dd class="players-card__detail-definition">{{ $player->rank }}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Титул:</dt>
                      <dd class="players-card__detail-definition">{{ $player->title }}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="visually-hidden">Страна</dt>
                      <dd class="players-card__detail-definition">
                        <img
                          class="players-card__country"
                          src="{{ $player->flag }}"
                          alt="United States"
                          width="80"
                          height="56">
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
            </li>
          @endforeach
        </ol>
        <button class="rating-section__button">
          Показать еще <span>12</span>
          <svg class="rating-section__button-icon" width="6" height="10">
            <use xlink:href="#arrow"></use>
          </svg>
        </button>
      </section>
    </div>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/pages/ratings/index.js') }}" type="module"></script>
@endsection
