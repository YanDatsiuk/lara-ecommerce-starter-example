@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Editing existing category</h3>

            <form action="{{url('admin/categories/edit/'.$category->id)}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-field">
                    <input placeholder="" id="title" type="text" class="validate"
                           name="title"
                           value="{{$category->title}}">
                    <label for="title">Title</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection