@extends('layouts.frontsite.default')

@section('content')

    <div class="container">
        <div class="section row">

            {{-- Breadcrumbs --}}
            <nav>
                <div class="nav-wrapper teal">
                    <div class="col s12">
                        <a href="{{url('/')}}" class="breadcrumb">Ретро байк</a>
                        <a href="{{url('/category')}}" class="breadcrumb">Каталог</a>
                        <a href="#" class="breadcrumb hide-on-med-and-down">Результати пошуку: "{{$searchTerm}}"</a>
                    </div>
                </div>
            </nav>

            {{-- Products --}}
            @include('partials.frontsite.products',['products' => $products])

            {{-- Pagination --}}
            @if ($products->count()>0)
                @include('partials.frontsite.pagination.default',[
                'paginator' => $products,
                'routeName' => $routeName,
                'routeParams' => $routeParams,])
            @endif

        </div>
    </div>

@endsection