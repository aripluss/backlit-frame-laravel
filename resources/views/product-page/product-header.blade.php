<section class="product-header">
  <div class="product-header__container container">
    <a href="{{ route('catalog') }}" class="product-header__link">
      <button class="product-header__btn-back btn btn--secondary" aria-label="Назад">⟵</button>
    </a>

    <div class="product-header__info">
      <h2 class="product-header__title">
        {{ $product->title }}
      </h2>

      @if($product->category)
        <span class="product-header__badge badge">
          {{ $product->category->name }}
        </span>
      @endif
    </div>
  </div>
</section>