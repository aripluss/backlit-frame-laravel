<section id="pagination" class="pagination">
  <div class="pagination__container container">
    <nav class="pagination__wrapper" aria-label="Pagination">

      <!-- Перша та попередня -->
      <a class="pagination__page-btn btn btn--secondary {{ $currentPage <= 1 ? 'disabled' : '' }}"
        href="{{ $currentPage > 1 ? route('catalog', array_merge(request()->query(), ['page' => 1])) : '#' }}">
        ⮜⮜
      </a>
      <a class="pagination__page-btn btn btn--secondary {{ $currentPage <= 1 ? 'disabled' : '' }}"
        href="{{ $currentPage > 1 ? route('catalog', array_merge(request()->query(), ['page' => $currentPage - 1])) : '#' }}">
        ⮜
      </a>

      @php
        $start = max(1, $currentPage - 2);
        $end = min($totalPages, $currentPage + 2);
      @endphp

      @if($start > 1)
        <a class="pagination__page-btn btn btn--secondary"
          href="{{ route('catalog', array_merge(request()->query(), ['page' => 1])) }}">1</a>
        @if($start > 2)
          <span class="pagination__dots">. . .</span>
        @endif
      @endif

      @for($p = $start; $p <= $end; $p++)
        <a class="pagination__page-btn btn {{ $p === $currentPage ? 'btn--primary pagination__page-btn--active' : 'btn--secondary' }}"
          href="{{ route('catalog', array_merge(request()->query(), ['page' => $p])) }}">
          {{ $p }}
        </a>
      @endfor

      @if($end < $totalPages)
        @if($end < $totalPages - 1)
          <span class="pagination__dots">. . .</span>
        @endif
        <a class="pagination__page-btn btn btn--secondary"
          href="{{ route('catalog', array_merge(request()->query(), ['page' => $totalPages])) }}">{{ $totalPages }}</a>
      @endif

      <!-- Наступна та остання -->
      <a class="pagination__page-btn btn btn--secondary {{ $currentPage >= $totalPages ? 'disabled' : '' }}"
        href="{{ $currentPage < $totalPages ? route('catalog', array_merge(request()->query(), ['page' => $currentPage + 1])) : '#' }}">
        ⮞
      </a>
      <a class="pagination__page-btn btn btn--secondary {{ $currentPage >= $totalPages ? 'disabled' : '' }}"
        href="{{ $currentPage < $totalPages ? route('catalog', array_merge(request()->query(), ['page' => $totalPages])) : '#' }}">
        ⮞⮞
      </a>

    </nav>
  </div>
</section>