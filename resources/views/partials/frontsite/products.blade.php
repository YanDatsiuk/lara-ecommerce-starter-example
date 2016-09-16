@foreach($products as $product)

    <div class="card product sticky-action large col s12 m6 l6">
        <div class="card-image waves-effect waves-block waves-light">
            @if (count($product->images)>0)
                <img class="activator responsive-img" src="{{url($product->images[0]['img_600_url'])}}">
            @else

            @endif

        </div>
        <div class="card-content">

            <a href="{{url("product/$product->slug")}}">
                <span class="card-title teal-text text-darken-4">{{$product->title}}</span>
            </a>

            <p class="blue-grey-text">{{$product->price_uah}} грн.
                <span class="new badge" data-badge-caption="{{$product->getCondition()}}"></span>
            </p>
        </div>

        <div class="card-action">
            <a href="#productModal{{$product->id}}" class="modal-trigger teal-text btn white">Замовити <i class="material-icons left">shopping_cart</i></a>
        </div>

        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">
                {{$product->title}}<i class="material-icons right">close</i>
            </span>

            <p class="flow-text">{{$product->description}}</p>
            <a href="{{url("product/$product->slug")}}" class="teal-text">Детальніше</a>
        </div>

        {{-- Modal Order --}}
        @include('partials.frontsite.modal.order', ['modalId' => 'productModal'. $product->id])

    </div>
@endforeach

