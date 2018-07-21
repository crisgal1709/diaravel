@if ($paginator->hasPages())

<div class="new-posts">

    <div class="clearfix">

        <div class="pull-left">
            @if ($paginator->onFirstPage())
                <span class="fa fa-long-arrow-left"></span>Anterior
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="prev">
                    <span class="fa fa-long-arrow-left"></span> 
                    Anterior
                </a>
            @endif
        </div>

        <a href="#" class="grid-btn"><span class="fa fa fa-th"></span></a>

        <div class="pull-right">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next">
                    Siguiente 
                    <span class="fa fa-long-arrow-right"></span>
                </a>
            @else
                Siguiente 
                <span class="fa fa-long-arrow-right"></span>
            @endif
        </div>
    </div>

@endif
