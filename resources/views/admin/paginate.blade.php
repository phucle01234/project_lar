@if ($paginator->hasPages())
    <ul class="pagination m-0 float-right">
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">{{ $page }}</li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif
