@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Jika halaman pertama --}}
        @if ($paginator->onFirstPage())
            {{-- Kosong --}}
        @else
            <li class="arrow-back"><a href="{{ $paginator->previousPageUrl() }}"><img src="{{ asset('frontend/img/icon/arrow_back_sm.png') }}" alt="arrow-back"></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page">{{ $page }}</li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        

        {{-- Jika halaman terakhir --}}
        @if ($paginator->hasMorePages())
            <li class="arrow-next"><a href="{{ $paginator->nextPageUrl() }}"><img src="{{ asset('frontend/img/icon/arrow_sm.png') }}" alt="arrow"></a></li>
        @else
            {{-- Kosong --}}
        @endif
        
        
    </ul>
@endif