@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Category Relations</h3>

            <table>

                {{-- Table headers --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Child category</th>
                    <th>Parent category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                {{-- Table rows --}}
                <tbody>
                @foreach($categoryRelations as $categoryRelation)
                    <tr>
                        <td>{{$categoryRelation->id}}</td>
                        <td>{{$categoryRelation->childCategory->title}}</td>
                        <td>{{$categoryRelation->parentCategory->title}}</td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/category-relations/edit/'.$categoryRelation->id)}}">
                                <i class="material-icons">mode_edit</i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/category-relations/delete/'.$categoryRelation->id)}}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {{-- Create category relation button --}}
            <a class="btn-floating btn-large waves-effect waves-light"
               href="{{url('/admin/category-relations/create')}}">
                <i class="material-icons">add</i>
            </a>

        </div>
    </div>

@endsection