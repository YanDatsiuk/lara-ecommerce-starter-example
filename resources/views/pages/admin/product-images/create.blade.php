@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Creating new product image</h3>

            <form action="{{url('admin/product-images/create')}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Product --}}
                <div class="input-field">
                    <select name="product_id">
                        <option value="" disabled selected>Choose product</option>

                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->title}}</option>
                        @endforeach
                    </select>
                    <label>Product</label>
                </div>

                {{-- Image --}}
                <div class="input-field">
                    <select name="image_id" class="icons">
                        <option value="" disabled selected>Choose image</option>

                        @foreach($images as $image)
                            <option value="{{$image->id}}" class="left circle" data-icon="{{url($image->img_600_url)}}">
                                {{$image->title}}
                            </option>
                        @endforeach
                    </select>
                    <label>Image</label>
                </div>

                {{-- Submit button --}}
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection