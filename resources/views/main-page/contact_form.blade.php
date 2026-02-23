<section id="contact-form" class="contact-form">
  <div class="contact-form__container container">
    <div class="contact-form__card">
      <div class="contact-form__header">
        <h2 class="contact-form__title">
          Бажаєте замовити або залишилися запитання?
        </h2>
        <p class="contact-form__subtitle">
          Залиште Ваші контакти, і ми допоможемо обрати ідеальний світильник
        </p>
      </div>

      <form action="{{ route('contact.submit') }}" method="POST" class="contact-form__form">
        @csrf
        <div class="contact-form__wrapper">
          <div class="contact-form__fields">
            <div class="contact-form__field">
              <label class="contact-form__label">Ваше ім'я</label>
              <input type="text" name="user_name" class="contact-form__input" required placeholder="Ірина"
                value="{{ $_COOKIE['last_user'] ?? '' }}" />
            </div>
            <div class="contact-form__field">
              <label class="contact-form__label">Номер телефону</label>
              <input type="tel" name="phone" required placeholder="+38 (0_ _ )_ _ _ _ _ _ _"
                class="contact-form__input" />
            </div>
          </div>

          <fieldset class="contact-form__fieldset">
            <legend class="contact-form__legend">Бажаний спосіб зв’язку</legend>

            <div class="contact-form__options">
              <label class="contact-form__option">
                <input type="radio" name="contact_method" value="Дзвінок" checked class="contact-form__radio" />
                <span class="contact-form__option-text">📞 Дзвінок</span>
              </label>

              <label class="contact-form__option">
                <input type="radio" name="contact_method" value="Viber" class="contact-form__radio" />
                <span class="contact-form__option-text">💬 Viber</span>
              </label>

              <label class="contact-form__option">
                <input type="radio" name="contact_method" value="Telegram" class="contact-form__radio" />
                <span class="contact-form__option-text">💬 Telegram</span>
              </label>

              <label class="contact-form__option">
                <input type="radio" name="contact_method" value="WhatsApp" class="contact-form__radio" />
                <span class="contact-form__option-text">💬 WhatsApp</span>
              </label>
            </div>
          </fieldset>
        </div>

        <button type="submit" class="contact-form__submit-btn btn btn--tertiary">
          <span>Надіслати запит</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="contact-form__submit-icon" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </button>
      </form>
    </div>
  </div>
</section>