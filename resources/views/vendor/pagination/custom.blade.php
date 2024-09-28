@if ($paginator->hasPages())
    <nav class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="py-2 px-3 bg-gray-200 text-gray-500 cursor-not-allowed rounded-l-md">Previous</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="py-2 px-3 bg-white border rounded-l-md text-blue-500 hover:bg-blue-100">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="py-2 px-3 bg-white text-gray-500">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="py-2 px-3 bg-blue-500 text-white">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="py-2 px-3 bg-white border text-blue-500 hover:bg-blue-100">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="py-2 px-3 bg-white border rounded-r-md text-blue-500 hover:bg-blue-100">Next</a>
                </li>
            @else
                <li class="py-2 px-3 bg-gray-200 text-gray-500 cursor-not-allowed rounded-r-md">Next</li>
            @endif
        </ul>
    </nav>
@endif
