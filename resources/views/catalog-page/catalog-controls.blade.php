@php
  $categories = ['Романтика', 'Серіали', 'Аніме', 'Абстракція', 'Природа', 'Космос', 'Автомобілі', 'Тварини', 'Ігри'];
  $currentCategory = request()->query('category', '');
  $searchQuery = request()->query('q', '');
@endphp

<section id="catalog-controls" class="catalog-controls">
  <div class="catalog-controls__header-wrapper container">
    <div class="catalog-controls__header">
      <h1 class="catalog-controls__title">Каталог дизайнів</h1>
      <p class="catalog-controls__subtitle">Наші роботи наживо</p>
    </div>

    <form class="catalog-controls__search" method="get">
      <input type="text" class="catalog-controls__search-input" placeholder="Пошук" name="q"
        value="{{ $searchQuery }}" />

      <!-- для поточної категорії, щоб при пошуку фільтр не стирався  -->
      @if($currentCategory)
        <input type="hidden" name="category" value="{{ $currentCategory }}">
      @endif


      <button class="btn btn--tertiary catalog-controls__search-btn">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </button>
    </form>
  </div>

  <div class="catalog-controls__filters container">
    @foreach($categories as $c)

      @php
        // Скидання фільтрації при повторному кліку
        $href = ($currentCategory === $c) ? url('catalog') : url('catalog') . '?category=' . urlencode($c);
      @endphp

      <a href="{{ $href }}"
        class="btn catalog-controls__filter-btn {{ $currentCategory === $c ? 'btn--primary' : 'btn--secondary' }}">
        {{ $c }}
      </a>
    @endforeach
  </div>
</section>