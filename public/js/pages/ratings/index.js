const ratingSection = document.querySelector('[data-section="ratings"]');
const resultSection = document.querySelector('.search-result');
const players = JSON.parse(document.querySelector('textarea').value);

document.querySelector('form')
  .addEventListener('submit', (evt) => evt.preventDefault());

document.body.addEventListener('click', (evt) => {
  if (evt.target.classList.contains('rating-section__button')) {
    const hiddenItems = evt.target.closest('section')
      .querySelectorAll('li.visually-hidden');

    if (hiddenItems.length >= 12) {
      for (let i = 0; i < 12; i++) {
        hiddenItems[i].classList.remove('visually-hidden');
      }
    }

    if (hiddenItems.length <= 12) {
      hiddenItems.forEach((item) => item.classList.remove('visually-hidden'));
      evt.target.remove();
    }
  }
});

document.querySelector('input[name="search"]')
  .addEventListener('input', (evt) => {
    if (evt.target.value === '') {
      ratingSection.classList.remove('visually-hidden');
      resultSection.innerHTML = '';
      return;
    }

    const result = players.filter((player) => player.name
      .toLowerCase().includes(evt.target.value.toLowerCase()));

    resultSection.innerHTML = `
      <section class="rating-section">
        <h2 class="rating-section__title">Результаты поиска</h2>

        <ol class="players-list">
          ${result.map((player) => `
          <li class="players-list__item">
            <div class="players-card">
                <img
                  class="players-card__image"
                  src="${player.avatar}"
                  alt="${player.name}"
                  width="120"
                  height="185"
                  loading="lazy"
                  onerror="this.src='images/avatar.webp'">

                <div class="players-card__inner">
                  <h3 class="players-card__name">
                    ${Array.from(player.name.split(' '), (word, i) =>
      i === 0 ? `<span>${word}, </span>` : word
    ).join('')}
                  </h3>

                  <dl class="players-card__details">
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Рейтинг:</dt>
                      <dd class="players-card__detail-definition">${player.rating}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Ранг:</dt>
                      <dd class="players-card__detail-definition">${player.rank}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="players-card__detail-title">Титул:</dt>
                      <dd class="players-card__detail-definition">${player.title}</dd>
                    </div>
                    <div class="players-card__detail">
                      <dt class="visually-hidden">Страна</dt>
                      <dd class="players-card__detail-definition">
                        <img
                          class="players-card__country"
                          src="${player.flag}"
                          alt="United States"
                          width="80"
                          height="56">
                      </dd>
                    </div>
                  </dl>
                </div>
              </div>
              </li>
          `).join('')}
        </ol>
    `;

    !ratingSection.classList.contains('visually-hidden') &&
      ratingSection.classList.add('visually-hidden');
  });
