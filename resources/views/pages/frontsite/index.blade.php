@extends('layouts.frontsite.default')

@section('content')

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>

                <h1 class="header center teal-text text-lighten-2">Ретро байк</h1>

                <div class="row center">
                    <h5 class="header col s12 light">Інтернет каталог раритетних мото запчастин</h5>
                </div>

                <div class="row">
                    <div class="col s12 center">

                        <a class="waves-effect waves-light btn-large"
                           href="{{url('category')}}">
                            <i class="material-icons right">view_list</i>Каталог
                        </a>

                    </div>
                </div>

            </div>
        </div>
        <div class="parallax"><img src="{{asset('frontsite/background1.jpg')}}" alt="Unsplashed background img 1"></div>
    </div>

    {{--
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">

                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material
                        Design</h5>

                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('frontsite/background2.jpg')}}" alt="Unsplashed background img 2"></div>
    </div>
    --}}

    <div class="container">
        <div class="section">

            <!--   Icon Section   -->


        </div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>Контакти для зв'язку</h4>

                    <p class="light text-lighten-1">
                        +38(099) 11 22 333
                        <a class="btn-floating waves-effect waves-light teal"
                           href="tel:{{'111'}}">
                            <i class="material-icons">phone</i>
                        </a>
                    </p>

                    <p class="light text-lighten-1">
                        +38(093) 11 22 333
                        <a class="btn-floating waves-effect waves-light teal"
                           href="tel:{{'111'}}">
                            <i class="material-icons">phone</i>
                        </a>
                    </p>

                    <p class="light text-lighten-1">
                        +38(097) 11 22 333
                        <a class="btn-floating waves-effect waves-light teal"
                           href="tel:{{'111'}}">
                            <i class="material-icons">phone</i>
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    {{--
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material
                        Design</h5>--}}
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('frontsite/background3.jpg')}}" alt="Unsplashed background img 3"></div>
    </div>

@endsection