<style>
    .pagination {
        width: 500px;
        /*background: red;*/
        /*margin-left: 50px;*/
        border: .3px solid #091D2E;
        display: flex;
        /*margin-right: auto;*/
    }
    .pagination li {
        border:  .3px solid #091D2E;
        /*border-top:none ;*/
        /*border-bottom: none;*/
        width: 30px;
        flex: auto;
        text-align: center;

    }
    .pagination li a {
        width: 100%;
        display: block;
        text-align: center;
        color: #091D2E;
    }
     .active {
        color: #ffff;
         background: #091D2E;
    }
    .flag a {
        /*font-size: 1.2em;*/

    }
</style>
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&laquo;</span></li>
        @else
            <li class="flag"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li class="links"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="flag"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="disabled"><span>&raquo;</span></li>
        @endif
    </ul>
@endif