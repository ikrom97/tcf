@extends('layouts.master')

@section('content')
  <main class="contacts-screen container">
    <h1 class="contacts-screen__title">Контакты</h1>

    <p class="contacts-screen__description">Для связи с нами, предложений и пожеланий, а также для более оперативного получения информации о деятельности Федерации шахмат Таджикистана представляем контактные номера и электронную почту.</p>

    <dl class="contacts-screen__details details">
      <div class="details__item">
        <dt class="details__term">
          Адрес офиса:
          <span class="details__icon">
            <svg width="20" height="20">
              <use xlink:href="#location"></use>
            </svg>
          </span>
        </dt>
        <dd class="details__definition">
          734000, Республика Таджикистан, <br>
          г. Душанбе, ул. Шамси 4Б
        </dd>
      </div>

      <div class="details__item">
        <dt class="details__term">
          Телефон:
          <span class="details__icon">
            <svg width="19" height="20">
              <use xlink:href="#phone"></use>
            </svg>
          </span>
        </dt>
        <dd class="details__definition">+992 93 600 01 69</dd>
        <dd class="details__definition">+992 98 862 49 00</dd>
      </div>

      <div class="details__item">
        <dt class="details__term">
          Электронная почта:
          <span class="details__icon">
            <svg width="20" height="16">
              <use xlink:href="#email"></use>
            </svg>
          </span>
        </dt>
        <dd class="details__definition">info@tjchess.tj</dd>
      </div>
    </dl>

    <div class="contacts-screen__map">
      <iframe title="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3119.0997071837996!2d68.7494225797177!3d38.577551683506165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38b5d226118d0233%3A0x464642d757c4b337!2zU3BpdGFtZW4gQmFuaywg0YPQuy4g0KjQsNC80YHQuCA0LCDQlNGD0YjQsNC90LHQtSwg0KLQsNC00LbQuNC60LjRgdGC0LDQvQ!5e0!3m2!1sru!2s!4v1667397782047!5m2!1sru!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </main>
@endsection
