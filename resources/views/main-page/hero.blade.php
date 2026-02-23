<section id="hero" class="hero">
  <div class="container hero__container">
    <div class="hero__content">
      <span class="hero__badge badge"> Зроблено в Україні 🇺🇦 </span>

      <h1 class="hero__title">
        Світлова картина, яка <span class="hero__accent">оживляє</span> ваш
        інтер’єр
      </h1>

      <p class="hero__description">
        Декоративний LED світильник з підсвіткою для дому, спальні або
        подарунку. Оберіть готовий дизайн або створіть унікальний зі своїм фото.
      </p>

      <div class="hero__buttons">
        <a href="{{ route('catalog') }}" class="btn btn--primary">Обрати дизайн</a>

        <a href="#custom" class="btn btn--secondary"> Створити кастомний </a>
      </div>
    </div>

    <div class="hero__image-frame js-frame">
      <img class="hero__image" src="./images/hero-image.webp"
        srcset="./images/hero-image.webp 1x, ./images/hero-image@2x.webp 2x" alt="Світлова картина з підсвіткою" />

      <button class="btn btn--glass hero__toggle js-light-toggle">
        <span class="hero__toggle-text">💡 Вимкнути</span>
      </button>
    </div>
  </div>
</section>