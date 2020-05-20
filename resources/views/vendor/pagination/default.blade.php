@if ($paginator->hasPages())
    {{--<nav>--}}
        <div class="col-12">
        <ul class="paginator">
            {{-- Previous Page Link --}}
            {{--@if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="paginator__item paginator__item--prev">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif--}}
            <li class="paginator__item paginator__item--prev">
                <a href="{{ $paginator->previousPageUrl() }}"><i class="icon ion-ios-arrow-back"></i></a>
            </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{--<li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
                    <li class="paginator__item"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{--<li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
                            <li class="paginator__item paginator__item--active">
                                <a href="#">{{ $page }}</a>
                            </li>
                        @else
                            <li class="paginator__item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            {{--@if ($paginator->hasMorePages())
                <li class="paginator__item paginator__item--next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif--}}
            <li class="paginator__item paginator__item--next">
                <a href="{{ $paginator->nextPageUrl() }}"><i class="icon ion-ios-arrow-forward"></i></a>
            </li>
        </ul>
        </div>
    {{--</nav>--}}
@endif
