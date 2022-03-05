

<br>
<div class="d-flex justify-content-center" style="margin-top: 10px;">
      
@if ($paginator->hasPages())
    <nav  role="navigation" aria-label="{{ __('Pagination Navigation') }}">
              <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            
         
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())

                       <li class="page-item disabled" >
                            <a class="page-link " href="#">
                              <i class="fa fa-angle-left"></i>
                            </a>
                        </li>

                    @else
                    <li class="page-item" >
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                          <i class="fa fa-angle-left"></i>

                        </a>
                    </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">
                                <a class="page-link" href="#"> {{ $element }}<span class="sr-only"></span></a>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
                                        <a class="page-link" href="#"> {{ $page }}<span class="sr-only">{{ $page }}</span></a>
                                      </li>

                                @else
                                <li class="page-item">
                                        <a class="page-link" href="{{ $url }}"> {{ $page }}<span class="sr-only">{{ $page }}</span></a>
                                      </li>


                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                         <li class="page-item" >
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                              <i class="fa fa-angle-right"></i>

                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" >
                            <a class="page-link " href="#">
                              <i class="fa fa-angle-right"></i>

                            </a>
                        </li>
                    @endif
                </ul>
          
        </div>

        <div>
                <p>
                    Se muestran
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    a
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    de
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    resultados
                </p>
            </div>




    </nav>
@endif
</div> 
