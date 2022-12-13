@extends('layouts.master')

@section('content')
  <main class="main-screen">
    <h1 class="visually-hidden">Федерация шахмат Таджикистана</h1>

    <section class="history-section container">
      <h2 class="history-section__title">
        <span>
          <span>История </span>
          <span>федерации <span>шахмат </span></span>
          <span>Таджикистана</span>
        </span>
      </h2>

      <p class="history-section__description">Федерация шахмат Таджикистана была образована в 1992 году. В том же году она стала одной из первых среди спортивных федераций независимого Таджикистана, удостоилась возможности стать членом Международной федерации шахмат.</p>

      <a class="history-section__button button" href="{{ route('about') }}">Подробнее</a>
    </section>

    <section class="chessmen-section">
      <h2 class="visually-hidden">Шахматные фигуры</h2>

      <ul class="chessmen-section__list">
        <li class="chessmen-section__item">
          <h3 class="chessmen-section__name">
            <small class="chessmen-section__figure">Фигура</small> Король
          </h3>
          <p class="chessmen-section__description">Самая ценная фигура, поскольку неустранимая угроза взятия (эта ситуация называется «мат») означает проигрыш партии. Ходит на одно поле по вертикали, горизонтали или диагонали, но не может ходить на поле, находящееся под ударом другой фигуры (ходить «под шах»).</p>

          <img
            class="chessmen-section__image"
            src="/images/king.webp"
            alt="Фигура король"
            width="155"
            height="401"
            loading="lazy">
        </li>

        <li class="chessmen-section__item">
          <h3 class="chessmen-section__name">
            <small class="chessmen-section__figure">Фигура</small> Ферзь
          </h3>

          <p class="chessmen-section__description">Самая сильная фигура, поскольку ходит на любое число полей по вертикали, горизонтали или диагонали — соединяет в себе ходы ладьи и слона. Изначально (в старом арабском шатрандже) ферзь ходил лишь на одно поле по диагонали и был слабой фигурой.</p>

          <img
            class="chessmen-section__image"
            src="/images/queen.webp"
            alt="Фигура ферзь"
            width="155"
            height="361"
            loading="lazy">
        </li>

        <li class="chessmen-section__item">
          <h3 class="chessmen-section__name">
            <small class="chessmen-section__figure">Фигура</small> Слон
          </h3>

          <p class="chessmen-section__description">В чатуранге и шатрандже ходил через одно поле по диагонали, являясь, как и конь, «прыгающей» фигурой (при ходе перешагивал через свои и чужие фигуры, стоящие на пути). В силу раскраски шахматной доски, слон перемещается только по полям одного цвета.</p>

          <img
            class="chessmen-section__image"
            src="/images/bishop.webp"
            alt="Фигура слон"
            width="139"
            height="282"
            loading="lazy">
        </li>

        <li class="chessmen-section__item">
          <h3 class="chessmen-section__name">
            <small class="chessmen-section__figure">Фигура</small> Ладья
          </h3>

          <p class="chessmen-section__description">Ходит на любое число полей по вертикали или горизонтали. Может участвовать в рокировке. В начале партии у каждого игрока по две ладьи, расположенные на крайних полях первой или восьмой горизонталей — белые ладьи на a1 и h1, чёрные на a8 и h8.</p>

          <img
            class="chessmen-section__image"
            src="/images/rook.webp"
            alt="Фигура ладья"
            width="141"
            height="253"
            loading="lazy">
        </li>

        <li class="chessmen-section__item">
          <h3 class="chessmen-section__name">
            <small class="chessmen-section__figure">Фигура</small> Конь
          </h3>

          <p class="chessmen-section__description">Может пойти на одно из полей, ближайших к тому, на котором он стоит, но не на той же самой горизонтали, вертикали или диагонали. Всегда попадает на поле противоположного цвета. Одна из двух фигур, ход которой не изменился со времён чатуранги.</p>

          <img
            class="chessmen-section__image"
            src="/images/knight.webp"
            alt="Фигура конь"
            width="154"
            height="270"
            loading="lazy">
        </li>

        <li class="chessmen-section__item">
          <h3 class="chessmen-section__name">
            <small class="chessmen-section__figure">Фигура</small> Пешка
          </h3>

          <p class="chessmen-section__description">Ходит на одно поле по вертикали вперёд. Из исходного положения может также сделать первый ход на два поля вперёд. Бьёт на одно поле по диагонали вперёд. При выполнении хода на два поля может быть следующим ходом взята на проходе пешкой противника.</p>

          <img
            class="chessmen-section__image"
            src="/images/pawn.webp"
            alt="Фигура пешка"
            width="135"
            height="232"
            loading="lazy">
        </li>
      </ul>
    </section>

    <section class="tournaments-section container">
      <h2 class="tournaments-section__title">
        <span>
          <span>Последние турниры, организованные</span>
          <span>федерацией <span>шахмат</span></span>
          <span>Таджикистана</span>
        </span>
      </h2>

      <p class="tournaments-section__description">На регулярной основе Федерация шахмат Таджикистана проводит турниры среди начинающих и опытных шахматистов страны, стараясь охватывать самый широкий пласт спортсменов. Подобного рода мероприятия помогают развитию шахмат и увеличивают интерес к этой интеллектуальной игре.</p>

      <a class="tournaments-section__button button" href="{{ route('tournaments') }}">
        Все турниры
      </a>

      <div class="tournaments__swiper swiper">
        <div class="swiper-wrapper">
          @foreach ($data->tournaments as $tournament)
            <div class="swiper-slide">
              <article class="tournaments-card">
                <img
                  class="tournaments-card__image"
                  src="{{ $tournament->thumb_image }}"
                  alt="{{ $tournament->title }}"
                  width="300"
                  height="169"
                  loading="lazy">
                <div class="tournaments-card__inner">
                  <time class="tournaments-card__time" datetime="{{ $tournament->date }}">
                    {{ Carbon\Carbon::create($tournament->date)->isoFormat('DD.MM.YYYY') }}
                  </time>
                  <h3 class="tournaments-card__title">{{ $tournament->title }}</h3>
                  <div class="tournaments-card__description">
                    {{ strip_tags($tournament->content) }}
                  </div>
                  <a
                    class="tournaments-card__more"
                    href="{{ route('tournaments', $tournament->slug) }}">Подробнее</a>
                </div>
              </article>
            </div>
          @endforeach
        </div>
        <div class="tournaments__swiper-scrollbar swiper-scrollbar"></div>
      </div>
    </section>

    <section class="ratings-section container">
      <h2 class="ratings-section__title">
        <span>
          <span>Рейтинг </span>
          <span>лучших <span>шахматистов</span></span>
          <span>по всему миру</span>
        </span>
      </h2>

      <p class="ratings-section__description">Шахматный рейтинг ФИДЕ от Международной шахматной федерации составляется ежемесячно. Топ лучших игроков основан на системе рейтинга Эло. Он вычисляется по результатам игр шахматистов друг с другом. Система рейтингов делит шахматистов на 9 классов: высший класс начинается с рейтинга 2600, низший – 1200 и ниже.</p>

      <a class="ratings-section__button button" href="{{ route('ratings') }}">
        Весь рейтинг
      </a>

      <div class="players__swiper swiper">
        <div class="swiper-wrapper">
          @foreach ($data->players as $player)
            <div class="swiper-slide">
              <div class="players-card">
                <img
                  class="players-card__image"
                  src="{{ $player->avatar }}"
                  alt="{{ $player->name }}"
                  width="120"
                  height="185"
                  loading="lazy" />

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
                      <dd class="players-card__detail-definition">
                        {{ $player->title }}
                      </dd>
                    </div>

                    <div class="players-card__detail">
                      <dt class="visually-hidden">Страна</dt>
                      <dd class="players-card__detail-definition">
                        <img
                          class="players-card__country"
                          src="{{ $player->flag }}"
                          alt="{{ $player->country }}"
                          width="80"
                          height="56" />
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="players__swiper-scrollbar swiper-scrollbar"></div>
      </div>
    </section>

    <section class="news-section container">
      <h2 class="news-section__title">
        <span>
          <span>Последние новости </span>
          <span>федерации <span>шахмат </span></span>
          <span>Таджикистана</span>
        </span>
      </h2>

      <p class="news-section__description">В данном разделе представлены все актуальные новости Федерации шахмат Таджикистана, а также мировые знаковые события в области шахмат. Результаты турниров, новые звезды, претенденты на звание лучших – все это вы можете узнать на нашем сайте.</p>

      <a class="news-section__button button" href="{{ route('news') }}">Все новости</a>

      <div class="news__swiper swiper">
        <div class="swiper-wrapper">
          @foreach ($data->news as $news)
            <div class="swiper-slide">
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
                    {{ strip_tags($news->content) }}
                  </div>

                  <a class="news-card__button button" href="{{ route('news', $news->slug) }}">
                    Подробнее
                  </a>
                </div>
              </article>
            </div>
          @endforeach
        </div>
        <div class="news__swiper-scrollbar swiper-scrollbar"></div>
      </div>
    </section>
  </main>
@endsection

@section('script')
  <script src="{{ asset('js/pages/home/index.js') }}"></script>
@endsection
