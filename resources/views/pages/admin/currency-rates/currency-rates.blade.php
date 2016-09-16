@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Currency rates</h3>

            <table>

                {{-- Table headers --}}
                <thead>
                <tr>
                    <th>Id</th>
                    <th>USD</th>
                    <th>UAH</th>
                    <th>EUR</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>

                {{-- Table rows --}}
                <tbody>
                @foreach($currencyRates as $currencyRate)
                    <tr>
                        <td>{{$currencyRate->id}}</td>
                        <td>{{$currencyRate->usd}}</td>
                        <td>{{$currencyRate->uah}}</td>
                        <td>{{$currencyRate->eur}}</td>
                        <td>{{$currencyRate->created_at}}</td>
                        <td>{{$currencyRate->updated_at}}</td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/currency-rates/edit/'.$currencyRate->id)}}">
                                <i class="material-icons">mode_edit</i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light"
                               href="{{url('/admin/currency-rates/delete/'.$currencyRate->id)}}">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            {{-- Create currency rate button --}}
            <a class="btn-floating btn-large waves-effect waves-light"
               href="{{url('/admin/currency-rates/create')}}">
                <i class="material-icons">add</i>
            </a>

        </div>
    </div>

@endsection