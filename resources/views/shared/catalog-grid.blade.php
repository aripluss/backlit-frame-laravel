<div class="catalog__grid">
    @foreach ($items as $item)
        @include('shared.catalog-item', ['item' => $item, 'isClickable' => $isClickable ?? true])
    @endforeach
</div>