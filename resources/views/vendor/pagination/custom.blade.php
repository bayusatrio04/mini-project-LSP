<div class="pagination p12">
    @if ($paginator->hasPages())
        <ul>
            @if ($paginator->onFirstPage())
                <a class="disabled" href="javascript:void(0)"><li>Previous</li></a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"><li>Previous</li></a>
            @endif

            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="is-active" href="javascript:void(0)"><li>{{ $page }}</li></a>
                        @else
                            <a href="{{ $url }}"><li>{{ $page }}</li></a>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"><li>Next</li></a>
            @else
                <a href="javascript:void(0)"><li>Next</li></a>
            @endif


        </ul>
    @endif
</div>
