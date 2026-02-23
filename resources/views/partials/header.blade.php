<header class="header">
  <div class="container header__container">
    <a href="{{ url('/') }}"><img class="logo logo--small" src="{{ asset('images/logo.webp') }}" alt="icon" width="36"
        height="32" />

      <img class="logo logo--large" src="{{ asset('images/logo-with-title.webp') }}" alt="icon" width="197"
        height="32" />
    </a>

    <nav class="header__navigation">
      <ul class="nav__list">
        <li class="nav__item">
          <a href="#popular-designs" class="nav__link"><span>Каталог</span></a>
        </li>
        <li class="nav__item">
          <a href="#how-it-works" class="nav__link"><span>Як це працює?</span></a>
        </li>
        <li class="nav__item">
          <a href="#feedback" class="nav__link"><span>Відгуки</span></a>
        </li>
        <li class="nav__item">
          <a href="#faq" class="nav__link"><span>FAQ</span></a>
        </li>
      </ul>
    </nav>

    <button class="btn btn--tertiary">Замовити</button>

    <button class="burger js-open-menu" aria-label="Відкрити меню" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>