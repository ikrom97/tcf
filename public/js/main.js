const mainNavigationToggler = document.querySelector('.main-navigation__toggler');

if (mainNavigationToggler) {
  mainNavigationToggler.addEventListener('click', () =>
    document.body.classList.toggle('page__body--menu-shown'));
}
