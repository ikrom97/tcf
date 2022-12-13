@if ($paginator->hasPages())
  <ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <li class="pagination__item pagination__item--disabled">
        <span class="pagination__link">
          <svg width="6" height="10">
            <use xlink:href="#arrow" />
          </svg>
        </span>
      </li>
    @else
      <li class="pagination__item">
        <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}">
          <svg width="6" height="10">
            <use xlink:href="#arrow" />
          </svg>
        </a>
      </li>
    @endif

    @if ($paginator->currentPage() > 3)
      <li class="pagination__item">
        <a class="pagination__link" href="{{ $paginator->url(1) }}">1</a>
      </li>
    @endif
    @if ($paginator->currentPage() > 4)
      <li class="pagination__item pagination__item--dots">
        <span class="pagination__link">...</span>
      </li>
    @endif
    @foreach (range(1, $paginator->lastPage()) as $i)
      @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
        @if ($i == $paginator->currentPage())
          <li class="pagination__item pagination__item--current">
            <span class="pagination__link">{{ $i }}</span>
          </li>
        @else
          <li class="pagination__item">
            <a class="pagination__link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
          </li>
        @endif
      @endif
    @endforeach
    @if ($paginator->currentPage() < $paginator->lastPage() - 3)
      <li class="pagination__item pagination__item--dots">
        <span class="pagination__link">...</span>
      </li>
    @endif
    @if ($paginator->currentPage() < $paginator->lastPage() - 2)
      <li class="pagination__item">
        <a class="pagination__link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
      </li>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <li class="pagination__item">
        <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}">
          <svg width="6" height="10">
            <use xlink:href="#arrow" />
          </svg>
        </a>
      </li>
    @else
      <li class="pagination__item pagination__item--disabled">
        <span class="pagination__link">
          <svg width="6" height="10">
            <use xlink:href="#arrow" />
          </svg>
        </span>
      </li>
    @endif
  </ul>
@endif
