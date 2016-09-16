@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Creating new currency rate</h3>

            <form action="{{url('admin/currency-rates/create')}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- USD --}}
                <div class="input-field">
                    <input placeholder="" id="usd" type="text" class="validate"
                           name="usd">
                    <label for="usd">USD</label>
                </div>

                {{-- UAH --}}
                <div class="input-field">
                    <input placeholder="" id="uah" type="text" class="validate"
                           name="uah">
                    <label for="uah">UAH</label>
                </div>

                {{-- EUR --}}
                <div class="input-field">
                    <input placeholder="" id="eur" type="text" class="validate"
                           name="eur">
                    <label for="eur">EUR</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection