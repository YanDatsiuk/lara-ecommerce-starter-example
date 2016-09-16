@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Editing existing image</h3>

            <form action="{{url('admin/images/edit/'.$image->id)}}" method="POST" class="row section" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Title --}}
                <div class="input-field">
                    <input placeholder="" id="title" type="text" class="validate"
                           name="title"
                           value="{{$image->title}}">
                    <label for="title">Title</label>
                </div>

                {{-- Image preview --}}
                @if (!is_null($image->img_600_url))
                    <img class="responsive-img" src="{{url($image->img_600_url)}}">
                @else
                    <span>broken image link</span>
                @endif

                {{-- Image file input --}}
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