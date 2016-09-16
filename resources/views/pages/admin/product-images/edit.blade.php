@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Editing existing product image</h3>

            <form action="{{url('admin/product-images/edit/'.$productImage->id)}}" method="POST"
                  class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Product --}}
                <div class="input-field">
                    <select name="product_id">
                        <option value="" disabled>Choose product</option>

                        @foreach($products as $product)

                            @if ($productImage->product_id == $product->id)
                                <option value="{{$product->id}}" selected>{{$product->title}}</option>
                            @else
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endif

                        @endforeach
                    </select>
                    <label>Product</label>
                </div>

                {{-- Image --}}
                <div class="input-field">
                    <select name="image_id" class="icons">
                        <option value="" disabled>Choose image</option>

                        @foreach($images as $image)

                            @if ($productImage->image_id == $image->id)
                                <option value="{{$image->id}}" class="left circle"
                                        data-icon="{{url($image->img_600_url)}}" selected>
                                    {{$image->title}}
                                </option>
                            @else
                                <option value="{{$image->id}}" class="left circle"
                                        data-icon="{{url($image->img_600_url)}}">
                                    {{$image->title}}
                                </option>
                            @endif

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