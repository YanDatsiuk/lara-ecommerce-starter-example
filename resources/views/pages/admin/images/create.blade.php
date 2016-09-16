@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Creating new image</h3>

            <form action="{{url('admin/images/create')}}" method="POST" class="row section" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="input-field">
                    <input placeholder="" id="title" type="text" class="validate"
                           name="title">
                    <label for="title">Title</label>
                </div>

                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="image_file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection