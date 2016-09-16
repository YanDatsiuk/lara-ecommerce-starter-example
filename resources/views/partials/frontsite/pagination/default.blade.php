{{-- pagination --}}

{{-- $paginator, 'photos' --}}
{{-- $routeName,  'queries' --}}
{{-- $routeParams,  ['sort_by' => 'subscribers_quantity'] // merge arrays. --}}

<ul class="pagination col s12">


    {{-- Prev page --}}
    @if ($paginator->currentPage() > 1)
        <li>
            <a href="{{route($routeName, array_merge(['page' => $paginator->currentPage() - 1], $routeParams))}}">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
    @else
        <li class="disabled">
            <a href="#!">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
    @endif

    <li class="active teal">
        <a href="{{route($routeName, array_merge(['page' => $paginator->currentPage()], $routeParams))}}">
            {{$paginator->currentPage()}}
        </a>
    </li>

    {{-- Next page --}}
    @if ($paginator->currentPage() < ($paginator->total() / env('PAGINATION_PRODUCT_PER_PAGE')))
        <li>
            <a href="{{route($routeName, array_merge(['page' => $paginator->currentPage() + 1], $routeParams))}}">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    @else
        <li class="disabled">
            <a href="#!">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    @endif

</ul>