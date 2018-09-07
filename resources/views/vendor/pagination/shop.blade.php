@if ($paginator->hasPages())
    <div class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
           <a href="javascript:void(0)" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="javascript:void(0)">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:void" class="active">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        @else
           <a href="javascript:void(0)" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        @endif
    </div>
@endif
