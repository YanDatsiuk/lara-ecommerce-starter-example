<div class="navbar-fixed">
    <nav class="blue-grey lighten-5" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{url('/')}}" class="brand-logo">Ретро байк</a>
            <ul class="right">

                <li><a href="#modal-search" class="search-modal-trigger"><i class="material-icons">search</i></a></li>

            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="{{url('category')}}">Каталог</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>

{{-- search modal --}}
@include('partials.frontsite.modal.search')


