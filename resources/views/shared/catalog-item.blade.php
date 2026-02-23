@php
  $isClickable = $isClickable ?? true; // клікабельна для каталогу за замовчуванням
@endphp

<article class="catalog__item {{ $isClickable ? '' : 'no-pointer' }}">
  <div class="catalog__image-wrapper">

    @if ($isClickable)
      <a href="{{ route('product.show', ['id' => $item['id']]) }}" class="catalog__link">
        <div class="catalog__image-overlay"></div>
        <img src="{{ asset($item['image']) }}" alt="{{ $item['alt'] }}" class="catalog__image" loading="lazy" />
      </a>
    @else
      <img src="{{ asset($item['image']) }}" alt="{{ $item['alt'] }}" class="catalog__image" loading="lazy" />
    @endif

  </div>

  <h4 class="catalog__title">{{ $item['title'] }}</h4>
  <p class="catalog__text">{{ $item['text'] }}</p>
</article>