<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">Admin Panel</a>

        <ul id="dropdown1" class="dropdown-content">
            <li><a href="{{url('/admin/articles')}}">Articles</a></li>
            <li><a href="{{url('/admin/categories')}}">Categories</a></li>
            <li><a href="{{url('/admin/category-relations')}}">Category Relations</a></li>
            <li><a href="{{url('/admin/products')}}">Products</a></li>
            <li><a href="{{url('/admin/images')}}">Images</a></li>
            <li><a href="{{url('/admin/product-images')}}">Product Images</a></li>
            <li><a href="{{url('/admin/currency-rates')}}">Currency Rates</a></li>
        </ul>

        <ul class="right hide-on-med-and-down">
            <li>
                <a class="dropdown-button" href="#!" data-activates="dropdown1">
                    Content<i class="material-icons right">arrow_drop_down</i>
                </a>
            </li>
            <li><a href="{{url('/')}}">View site</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
            <li><a href="{{url('/admin')}}">Home</a></li>
            <li><a href="{{url('/admin/articles')}}">Articles</a></li>
            <li><a href="{{url('/admin/categories')}}">Categories</a></li>
            <li><a href="{{url('/admin/category-relations')}}">Category Relations</a></li>
            <li><a href="{{url('/admin/products')}}">Products</a></li>
            <li><a href="{{url('/admin/images')}}">Images</a></li>
            <li><a href="{{url('/admin/product-images')}}">Product Images</a></li>
            <li><a href="{{url('/admin/currency-rates')}}">Currency Rates</a></li>
            <li><a href="{{url('/')}}">View site</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>