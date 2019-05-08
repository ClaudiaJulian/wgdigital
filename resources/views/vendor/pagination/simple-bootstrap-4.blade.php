@if ($paginator->hasPages())

    <ul class="index" role="navigation">
    {{-- <ul class="pagination" role="navigation">     --}}   
        
       
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link" style="font-size:0.8em;color:grey;">@lang('pagination.previous')</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" style="font-size:0.8em;" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li>
        @endif

        <li style="font-size:0.8em;margin-left:30px;margin-right:30px;"> Outfit: {{ $paginator->currentPage() }}</li>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" style="font-size:0.8em;" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link" style="font-size:0.8em;color:grey;">@lang('pagination.next')</span>
            </li>
        @endif
    </ul>
@endif
