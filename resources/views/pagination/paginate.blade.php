@if ($paginator->hasPages())
    <ul class="pagination pagination pull-right">
        {{-- Previous Page Link --}}
        @if($paginator->currentPage() > 1)
            <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">First</a></li>
        @else
            <li class="disabled"><span>First</span></li>
        @endif

        {{-- <li><a href="{{preg_replace('/\?'.$paginator->getPageName().'=[1]$/','',$url)}}">{{ $page }}</a></li> --}}

        @if ($paginator->onFirstPage())
            <li class="disabled"><span>«</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($i >= $paginator->currentPage() - 3 && $i <= $paginator->currentPage() + 3)

                @if ($i == $paginator->currentPage())
                    <li class="active"><span>{{ $i }}</span></li>
                @elseif ($i != $paginator->currentPage())
                    <li><a href="{{$paginator->url($i)}}">{{$i}}</a></li>
                @endif
               
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="disabled"><span>»</span></li>
            <li class="disabled"><span>Last</span></li>
        @endif

        {{-- last page --}}
        @if($paginator->currentPage() < $paginator->lastPage())
            <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">Last</a></li>
        @endif
    </ul>
@endif

