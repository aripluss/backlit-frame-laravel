<section id="pagination" class="pagination">
  <div class="pagination__container container">
    <nav class="pagination__wrapper" aria-label="Pagination">

      <!-- Перша та попередня -->
      <a class="pagination__page-btn btn btn--secondary <?= $currentPage <= 1 ? 'disabled' : '' ?>"
        href="<?= $currentPage > 1 ? '?page=1' . ($category ? '&category=' . urlencode($category) : '') : '#' ?>">
        ⮜⮜
      </a>
      <a class="pagination__page-btn btn btn--secondary <?= $currentPage <= 1 ? 'disabled' : '' ?>"
        href="<?= $currentPage > 1 ? '?page=' . ($currentPage - 1) . ($category ? '&category=' . urlencode($category) : '') : '#' ?>">
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

      <!-- if ($start > 1) {
  echo '<a class="pagination__page-btn btn btn--secondary" href="?page=1' . ($category ? '&category=' . urlencode($category) : '') . '">1</a>';
  if ($start > 2)
    echo '<span class="pagination__dots">. . .</span>';
} -->

      @for($p = $start; $p <= $end; $p++)
        <a class="pagination__page-btn btn {{ $p === $currentPage ? 'btn--primary pagination__page-btn--active' : 'btn--secondary' }}"
          href="{{ route('catalog', array_merge(request()->query(), ['page' => $p])) }}">
          {{ $p }}
        </a>
      @endfor

      <!-- for ($p = $start; $p <= $end; $p++):
        ?>
      <a class="pagination__page-btn btn <?= $p === $currentPage ? 'btn--primary pagination__page-btn--active' : 'btn--secondary' ?>"
        href="?page=<?= $p ?><?= $category ? '&category=' . urlencode($category) : '' ?>">
        <?= $p ?>
      </a> -->

      @if($end < $totalPages)
        @if($end < $totalPages - 1)
          <span class="pagination__dots">. . .</span>
        @endif
        <a class="pagination__page-btn btn btn--secondary"
          href="{{ route('catalog', array_merge(request()->query(), ['page' => $totalPages])) }}">{{ $totalPages }}</a>
      @endif

      <?php
// if ($end < $totalPages) {
//   if ($end < $totalPages - 1)
//     echo '<span class="pagination__dots">. . .</span>';
//   echo '<a class="pagination__page-btn btn btn--secondary" href="?page=' . $totalPages . ($category ? '&category=' . urlencode($category) : '') . '">' . $totalPages . '</a>';
// }
      ?>

      <!-- Наступна та остання -->
      <a class="pagination__page-btn btn btn--secondary <?= $currentPage >= $totalPages ? 'disabled' : '' ?>"
        href="<?= $currentPage < $totalPages ? '?page=' . ($currentPage + 1) . ($category ? '&category=' . urlencode($category) : '') : '#' ?>">
        ⮞
      </a>
      <a class="pagination__page-btn btn btn--secondary <?= $currentPage >= $totalPages ? 'disabled' : '' ?>"
        href="<?= $currentPage < $totalPages ? '?page=' . $totalPages . ($category ? '&category=' . urlencode($category) : '') : '#' ?>">
        ⮞⮞
      </a>

    </nav>
  </div>
</section>