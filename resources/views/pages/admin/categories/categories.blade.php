@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Categories</h3>

            <table>

                {{-- Table headers --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                {{-- Table rows --}}
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/categories/edit/'.$category->id)}}">
                                <i class="material-icons">mode_edit</i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/categories/delete/'.$category->id)}}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {{-- Create category button --}}
            <a class="btn-floating btn-large waves-effect waves-light"
               href="{{url('/admin/categories/create')}}">
                <i class="material-icons">add</i>
            </a>

        </div>
    </div>

@endsection