@php
  $isClickable = $isClickable ?? true; // клікабельна для каталогу за замовчуванням

  $image = is_array($item) ? $item['image'] : $item->image;
  $alt = is_array($item) ? $item['alt'] : $item->alt;
  $title = is_array($item) ? $item['title'] : $item->title;
  $text = is_array($item) ? $item['text'] : $item->text;
  $id = is_array($item) ? $item['id'] : $item->id;
@endphp

<article class="catalog__item {{ $isClickable ? '' : 'no-pointer' }}">
  <div class="catalog__image-wrapper">

    @if ($isClickable)
      <a href="{{ route('product.show', ['id' => $id]) }}" class="catalog__link">
        <div class="catalog__image-overlay"></div>
        <img src="{{ asset($image) }}" alt="{{ $alt }}" class="catalog__image" loading="lazy" />
      </a>
    @else
      <img src="{{ asset($image) }}" alt="{{ $alt }}" class="catalog__image" loading="lazy" />
    @endif

  </div>

  <h4 class="catalog__title">{{ $title }}</h4>
  <p class="catalog__text">{{ $text }}</p>
</article>