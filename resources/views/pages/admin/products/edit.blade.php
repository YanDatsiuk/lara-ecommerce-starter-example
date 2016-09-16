@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Editing existing product</h3>

            <form action="{{url('admin/products/edit/'.$product->id)}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Title --}}
                <div class="input-field">
                    <input placeholder="" id="title" type="text" class="validate"
                           name="title"
                           value="{{$product->title}}">
                    <label for="title">Title</label>
                </div>

                {{-- Description --}}
                <div class="input-field">
                    <textarea id="description" name="description"
                              class="materialize-textarea">{{$product->description}}</textarea>
                    <label for="description">Description</label>
                </div>

                {{-- Category --}}
                <div class="input-field">
                    <select name="category_id">
                        <option value="" disabled selected>Choose product category</option>

                        @foreach($categories as $category)
                            @if($category->id == $product->category_id)
                                <option value="{{$category->id}}" selected>{{$category->title}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Product category</label>
                </div>

                {{-- Status --}}
                <div class="input-field">
                    <select name="status">
                        <option value="" disabled>Choose product status</option>

                        <option value="public" @if($product->status=='public') selected @endif>Public</option>
                        <option value="archive" @if($product->status=='archive') selected @endif>Archive</option>
                        <option value="private" @if($product->status=='private') selected @endif>Private</option>

                    </select>
                    <label>Product status</label>
                </div>

                {{-- Price --}}
                <div class="input-field col s6">
                    <input placeholder="" id="price" type="text" class="validate"
                           name="price"
                           @if (!is_null($product->price)) value="{{$product->price}}" @endif
                            >
                    <label for="price">Price</label>
                </div>

                {{-- Currency --}}
                <div class="input-field col s6">
                    <select name="currency">
                        <option value="" disabled>Choose product currency</option>

                        <option value="uah" @if($product->selected_currency=='uah') selected @endif>UAH</option>
                        <option value="usd" @if($product->selected_currency=='usd') selected @endif>USD</option>
                        <option value="eur" @if($product->selected_currency=='eur') selected @endif>EUR</option>

                    </select>
                    <label>Product currency</label>
                </div>

                {{-- Condition --}}
                <div class="input-field col s12">
                    <select name="condition">
                        <option value="" disabled>Choose product condition</option>

                        <option value="new" @if($product->condition=='new') selected @endif>New</option>
                        <option value="used" @if($product->condition=='used') selected @endif>Used</option>

                    </select>
                    <label>Product condition</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection