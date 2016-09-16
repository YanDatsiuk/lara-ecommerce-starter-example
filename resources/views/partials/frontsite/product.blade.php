<div class="row col s12">


    {{-- Title --}}
    <h4 class="col s12 m10">{{$product->title}}</h4>

    {{-- Price --}}
    <p class="col s12 m2 blue-grey-text right-align">{{$product->price_uah}} грн.</p>

    {{-- Description --}}
    <p class="col s12 m12">
        <span class="flow-text">{{$product->description}}</span>
    </p>

    {{-- Images --}}
    <div class="col s12 card-panel">
        @foreach($product->images as $image)

            <a href="{{$image['origin_url']}}" data-lightbox="roadtrip" class="col s6 m4" style="margin-top: 6px">
                <img class="responsive-img" src="{{url($image['img_600_url'])}}">
            </a>

        @endforeach
    </div>

    {{-- Order button --}}
    <div class="col offset-m3 hide-on-small-only"></div>
    <a class="modal-trigger waves-effect waves-light btn-large col s12 m6 white teal-text"
       href="#productModal{{$product->id}}">
        <i class="material-icons right">shopping_cart</i>Замовити
    </a>

    <div class="col offset-m3 hide-on-small-only"></div>

</div>

{{-- Modal Order --}}
@include('partials.frontsite.modal.order', ['modalId' => 'productModal'. $product->id])