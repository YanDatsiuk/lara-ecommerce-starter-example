@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Images</h3>

            <table>

                {{-- Table headers --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image 600px</th>
                    <th>Image origin</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                {{-- Table rows --}}
                <tbody>
                @foreach($images as $image)
                    <tr>
                        <td>{{$image->id}}</td>
                        <td>{{$image->title}}</td>

                        @if (!is_null($image->img_600_url))
                            <td><img class="responsive-img" src="{{url($image->img_600_url)}}" width="200"></td>
                        @else
                            <td>image link is broken</td>
                        @endif

                        @if (!is_null($image->origin_url))
                            <td><a href="{{url($image->origin_url)}}">image link</a></td>
                        @else
                            <td>image link is broken</td>
                        @endif

                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/images/edit/'.$image->id)}}">
                                <i class="material-icons">mode_edit</i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/images/delete/'.$image->id)}}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {{-- Create image button --}}
            <a class="btn-floating btn-large waves-effect waves-light"
               href="{{url('/admin/images/create')}}">
                <i class="material-icons">add</i>
            </a>

        </div>
    </div>

@endsection