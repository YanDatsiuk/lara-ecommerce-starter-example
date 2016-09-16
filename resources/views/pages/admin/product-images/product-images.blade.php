@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Product images</h3>

            <table>

                {{-- Table headers --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                {{-- Table rows --}}
                <tbody>
                @foreach($productImages as $productImage)
                    <tr>
                        <td>{{$productImage->id}}</td>
                        <td>{{$productImage->product->title}}</td>

                        @if (!is_null($productImage->image->img_600_url))
                            <td><img class="responsive-img" src="{{$productImage->image->img_600_url}}" width="200"></td>
                        @else
                            <td>image link is broken</td>
                        @endif

                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/product-images/edit/'.$productImage->id)}}">
                                <i class="material-icons">mode_edit</i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/product-images/delete/'.$productImage->id)}}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {{-- Create product image button --}}
            <a class="btn-floating btn-large waves-effect waves-light"
               href="{{url('/admin/product-images/create')}}">
                <i class="material-icons">add</i>
            </a>

        </div>
    </div>

@endsection