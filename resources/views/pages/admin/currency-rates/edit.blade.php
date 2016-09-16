@extends('layouts.admin.default')

@section('content')

    <div class="container">
        <div class="section">

            <h3>Editing existing currency rate</h3>

            <form action="{{url('admin/currency-rates/edit/'.$currencyRate->id)}}" method="POST" class="row section">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- USD --}}
                <div class="input-field">
                    <input placeholder="" id="usd" type="text" class="validate"
                           name="usd"
                           value="{{$currencyRate->usd}}">
                    <label for="usd">USD</label>
                </div>

                {{-- UAH --}}
                <div class="input-field">
                    <input placeholder="" id="uah" type="text" class="validate"
                           name="uah"
                           value="{{$currencyRate->uah}}">
                    <label for="uah">UAH</label>
                </div>

                {{-- EUR --}}
                <div class="input-field">
                    <input placeholder="" id="eur" type="text" class="validate"
                           name="eur"
                           value="{{$currencyRate->eur}}">
                    <label for="eur">EUR</label>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                </button>

            </form>


        </div>
    </div>



@endsection