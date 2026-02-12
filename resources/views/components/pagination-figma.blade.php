@if ($paginator->hasPages())
<div class="figma-pagination">

    <div class="pagination-info">
        Showing 
        {{ $paginator->firstItem() }}-
        {{ $paginator->lastItem() }} 
        of {{ $paginator->total() }}
    </div>

    <div class="pagination-nav">

        @if ($paginator->onFirstPage())
            <span class="nav-disabled">‹</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="nav-arrow">‹</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="nav-arrow">›</a>
        @else
            <span class="nav-disabled">›</span>
        @endif

    </div>
</div>
@endif
