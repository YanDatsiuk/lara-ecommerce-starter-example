@extends('layouts.frontsite.default')

@section('content')

    <div class="container">
        <div class="section row">

            {{-- pagination --}}
            <nav>
                <div class="nav-wrapper teal">
                    <div class="col s12">
                        <a href="{{url('/')}}" class="breadcrumb">Ретро байк</a>
                        <a href="{{url('/category')}}" class="breadcrumb">Каталог</a>
                        <a href="{{url("/product/".$product->slug)}}" class="breadcrumb hide-on-med-and-down">{{$product->title}}</a>
                    </div>
                </div>
            </nav>

            {{-- product --}}
            @include('partials.frontsite.product',['product' => $product])

        </div>
    </div>

@endsection