@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Editing existing category relation</h3>

            <form action="{{url('admin/category-relations/edit/'.$categoryRelation->id)}}" method="POST"
                  class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Child category --}}
                <div class="input-field">
                    <select name="child_category_id">
                        <option value="" disabled>Choose child category</option>

                        @foreach($categories as $category)
                            @if($category->id == $categoryRelation->child_category_id)
                                <option value="{{$category->id}}" selected>{{$category->title}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label>Child category</label>
                </div>

                {{-- Parent category --}}
                <div class="input-field">
                    <select name="parent_category_id">
                        <option value="" disabled>Choose parent category</option>

                        @foreach($categories as $category)
                            @if($category->id == $categoryRelation->parent_category_id)
                                <option value="{{$category->id}}" selected>{{$category->title}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endif
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