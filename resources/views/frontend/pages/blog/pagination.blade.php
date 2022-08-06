<div class="pagination-wrap">
  <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
    <i class="fa fa-arrow-left"></i>
  </a>
  @for ($i = $paginator->currentPage(); $i <= ($paginator->currentPage() + 5) && $i <= $paginator->lastPage(); $i++)
  <a href="{{ $paginator->url($i) }}" class="pagination-link {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
  @endfor
  <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
    <i class="fa fa-arrow-right"></i>
  </a>
</div>