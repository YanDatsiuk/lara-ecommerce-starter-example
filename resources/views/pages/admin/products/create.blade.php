@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Creating new product</h3>

            <form action="{{url('admin/products/create')}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Title --}}
                <div class="input-field col s12">
                    <input placeholder="" id="title" type="text" class="validate"
                           name="title">
                    <label for="title">Title</label>
                </div>

                {{-- Description --}}
                <div class="input-field col s12">
                    <textarea id="description" name="description" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>

                {{-- Category --}}
                <div class="input-field col s12">
                    <select name="category_id">
                        <option value="" disabled selected>Choose product category</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    <label>Product category</label>
                </div>

                {{-- Status --}}
                <div class="input-field col s12">
                    <select name="status">
                        <option value="" disabled selected>Choose product status</option>

                        <option value="public">Public</option>
                        <option value="archive">Archive</option>
                        <option value="private">Private</option>

                    </select>
                    <label>Product status</label>
                </div>

                {{-- Price --}}
                <div class="input-field col s6">
                    <input placeholder="" id="price" type="text" class="validate"
                           name="price">
                    <label for="price">Price</label>
                </div>

                {{-- Currency --}}
                <div class="input-field col s6">
                    <select name="currency">
                        <option value="" disabled selected>Choose product currency</option>

                        <option value="uah">UAH</option>
                        <option value="usd">USD</option>
                        <option value="eur">EUR</option>

                    </select>
                    <label>Product currency</label>
                </div>

                {{-- Condition --}}
                <div class="input-field col s12">
                    <select name="condition">
                        <option value="" disabled selected>Choose product condition</option>

                        <option value="new">New</option>
                        <option value="used">Used</option>

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