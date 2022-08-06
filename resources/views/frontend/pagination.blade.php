<div class="pagination-wrap">
  @if ($paginator->currentPage() > 1)
  <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">
    <i class="fa fa-arrow-left"></i>
  </a>
  @endif
  @for ($i = $paginator->currentPage() > 5 ? $paginator->currentPage() - 5 : 1; $i <= ($paginator->currentPage() + 5) && $i <= $paginator->lastPage(); $i++)
  <a href="{{ $paginator->url($i) }}" class="pagination-link {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
  @endfor
  @if ($paginator->currentPage() != $paginator->lastPage())
  <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">
    <i class="fa fa-arrow-right"></i>
  </a>
  @endif
</div>