@if ($route != 'about')
  <header class="{{ $route == 'home' ? 'page-header page-header--main' : 'page-header' }}">
    <nav class="main-navigation container">
      @if ($route == 'home')
        <div class="main-logo">
          <picture>
            <source media="(min-width:992px)" srcset="{{ asset('images/logo-extended.webp') }}">
            <source media="(min-width:576px)" srcset="{{ asset('images/logo-tablet.webp') }}">
            <img
              class="main-logo__image"
              src="{{ asset('images/logo-mobile.svg') }}"
              width="169"
              height="44"
              alt="Федерация шахмат Таджикистана"
              loading="lazy" />
          </picture>
        </div>
      @else
        <a class="main-logo" href="{{ route('home') }}">
          <picture>
            <source media="(min-width:992px)" srcset="{{ asset('images/logo-desktop.webp') }}" />
            <source media="(min-width:576px)" srcset="{{ asset('images/logo-tablet.webp') }}" />
            <img
              class="main-logo__image"
              src="{{ asset('images/logo-mobile.svg') }}"
              width="169"
              height="44"
              alt="Федерация шахмат Таджикистана" />
          </picture>
        </a>
      @endif

      <button class="main-navigation__toggler" type="button">
        <span class="visually-hidden">Переключатель меню</span>
        <svg class="main-navigation__menu-icon" width="32" height="32">
          <use xlink:href="#menu"></use>
        </svg>
        <svg class="main-navigation__close-icon" width="32" height="32">
          <use xlink:href="#close"></use>
        </svg>
      </button>

      <ul class="page-navigation">
        <li class="page-navigation__item {{ $route == 'home' ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" href="{{ route('home') }}">Главная</a>
        </li>
        <li class="page-navigation__item {{ $route == 'news' ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" href="{{ route('news') }}">Новости</a>
        </li>
        <li class="page-navigation__item {{ $route == 'tournaments' ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" href="{{ route('tournaments') }}">Турниры</a>
        </li>
        <li class="page-navigation__item {{ $route == 'ratings' ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" href="{{ route('ratings') }}">Рейтинг</a>
        </li>
        <li class="page-navigation__item {{ $route == 'articles' ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" href="{{ route('articles') }}">Статьи</a>
        </li>
        <li class="page-navigation__item {{ $route == 'contacts' ? 'page-navigation__item--current' : '' }}">
          <a class="page-navigation__link" href="{{ route('contacts') }}">Контакты</a>
        </li>
      </ul>

      <a class="tournament-details" href="/tournaments#upcoming-tournaments">
        <svg class="tournament-details__icon" width="40" height="40">
          <use xlink:href="#clock-chess"></use>
        </svg>
        <div class="tournament-details__inner">
          Предстоящие турниры:<small class="tournament-details__count">{{ $upcomings }}</small><br>
          Подробнее
        </div>
      </a>
    </nav>

    @if ($route == 'home')
      <picture>
        <source media="(min-width:992px)" srcset="{{ asset('images/banner-desktop.webp') }}" />
        <source media="(min-width:576px)" srcset="{{ asset('images/banner-tablet.webp') }}" />
        <img
          class="page-header__banner"
          src="{{ asset('images/banner-mobile.webp') }}"
          width="320"
          height="213"
          alt="Шахматная доска" />
      </picture>
      <span class="page-header__icon">
        <svg width="10" height="24">
          <use xlink:href="#chessman" />
        </svg>
      </span>
    @endif
  </header>
@endif
