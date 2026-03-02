<section class="product">
  <div class="product__container container">

    <!-- Image -->
    <div class="product__image-wrapper">
      <img class="product__image" src="{{ asset($product->image) }}" alt="{{ $product->title }}" />
      <button class="btn btn--glass product__toggle js-light-toggle">💡 Вимкнути</button>
    </div>

    <!-- Content -->
    <div class="product__content" data-id="{{ $product->id }}" data-size="{{ $product->selectedSize }}"
      data-custom="{{ $product->customDesign ? '1' : '0' }}" data-base-price="{{ $product['basePrice'] }}">

      <div class="product__text-wrapper">
        <h3 class="product__title">LED світильник
          {{ $product->title }}
          <span class="product__origin">{{ $product->origin }}</span>
        </h3>

        <p class="product__description">
          {{ $product->description }}
        </p>

        <p class="product__benefit">
          {{ $product->benefit }}
        </p>
      </div>

      <!-- Sizes -->
      <div class="product__sizes">
        <p class="product__sizes-title">Розмір</p>
        <div class="product__sizes-list">
          @foreach ($product->sizes as $size)
            <button data-size="{{ $size }}"
              class="product__size btn btn--secondary {{ $product->selectedSize === $size ? 'product__size--active' : '' }}">
              {{ $size }}
            </button>
          @endforeach
        </div>
      </div>

      <!-- Checkbox -->
      <label class="product__option">
        <input type="checkbox" class="product__checkbox" @if($product->customDesign) checked @endif />
        Індивідуальний макет (+{{ $product->customPrice }} грн)
      </label>

      <!-- Price -->
      <div class="product__price-btn-wrapper">
        <div class="product__price">

          @if($product->discount > 0)
            <span class="product__price-old">{{ $price }} грн</span>
            <span class="product__price-value">{{ $discountedPrice }} грн</span>
            <span class="product__badge-discount">(-{{ $product->discount * 100 }}%)</span>
          @else
            <span class="product__price-value">{{ $price }} грн</span>
          @endif

          <span class="product__price-note">обраний розмір {{ $product->selectedSize }}</span>
        </div>

        <button class="product__cta btn btn--primary">Замовити світильник</button>
      </div>

    </div>
  </div>
</section>