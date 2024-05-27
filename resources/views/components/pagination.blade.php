@if (isset($paginator))
@php
    $queryParams = (isset($appends ) && gettype($appends) === 'array') ? '&' . http_build_query($appends) : ''
@endphp
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center gap-3">
        {{-- Previous Page Link --}}
        @if ($paginator->isFirstPage())
            <span class="pagination-active">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="?page={{ $paginator->getNumberPreviousPage() }}{{ $queryParams }}" rel="prev" class="pagination">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if (!$paginator->isLastPage())
            <a href="?page={{ $paginator->getNumberNextPage() }}{{ $queryParams }}" rel="next" class="pagination">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="pagination-active">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif