{{--  <style>
    .active2 {
        background-color: black!important;
    color: white}
    .pager li {
        display: inline;
    }
    .pager {
        padding-left: 0;
        margin: 20px 0;
        text-align: center;
        list-style: none;
    }.active2 {
        background-color: black!important;
        color: white;
    }
    .pager li>a, .pager li>span {
        display: inline-block;
        padding: 5px 14px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 15px;
    }
</style>  --}}

@if ($paginator->hasPages())
    <ul class="pagination pagination-sm m-0 float-right">
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item">{{ $page }}</li>
                    @else
                        <li class="page-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif

{{--  @if ($paginator->hasPages())
    <ul class="pager">
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span class="@if($page==$paginator->currentPage()) active2 @endif">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
@endif  --}}
