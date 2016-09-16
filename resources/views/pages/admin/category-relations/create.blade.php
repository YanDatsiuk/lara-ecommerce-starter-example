@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Creating new category relation</h3>

            <form action="{{url('admin/category-relations/create')}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Child category --}}
                <div class="input-field">
                    <select name="child_category_id">
                        <option value="" disabled selected>Choose child category</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    <label>Child category</label>
                </div>

                {{-- Parent category --}}
                <div class="input-field">
                    <select name="parent_category_id">
                        <option value="" disabled selected>Choose parent category</option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    <label>Parent category</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection