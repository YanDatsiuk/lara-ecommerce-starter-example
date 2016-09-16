@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Creating new category</h3>

            <form action="{{url('admin/categories/create')}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-field">
                    <input placeholder="" id="title" type="text" class="validate"
                           name="title">
                    <label for="title">Title</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection