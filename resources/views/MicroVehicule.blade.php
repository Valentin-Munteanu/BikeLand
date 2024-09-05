@extends("loyaut")
@section("title", "Micro Vehicule")
@section("content")
<div class="page-container">
    <div class="filters">
        <h2>Filtrează Trotinetele</h2>
        <form action="{{ route("trotinete") }}" method="GET">
            <div>
                <label for="name_trt">Nume Trotinetă:</label>
                <input type="text" name="name_trt" id="name_trt" value="{{ request('name_trt') }}">
            </div>

            <div>
                <label for="speed_trt">Viteza trotinetei:</label>
                <input type="text" name="speed_trt" id="speed_trt" value="{{ request('speed_trt') }}">
            </div>
            <div>
                <label for="color_trt">Culoare:</label>
                <input type="text" name="color_trt" id="color_trt" value="{{ request('color_trt') }}">
            </div>
            <div>
                <label for="sort_price">Sortare după preț:</label>
                <select name="sort_price" id="sort_price">
                    <option value="">Selectează</option>
                    <option value="asc" {{ request('sort_price') == 'asc' ? 'selected' : '' }}>Crescător</option>
                    <option value="desc" {{ request('sort_price') == 'desc' ? 'selected' : '' }}>Descrescător</option>
                </select>
            </div>
            <button type="submit">Filtrează</button>
        </form>
    </div>

    <div class="products-container">
        @if($trotinete->isEmpty())
            <p class="no-exist">Nu există trotinete disponibile.</p>
        @else
            @foreach ($trotinete as $trt)
                <div class="bike-sale2">
                    <div class="img-sale2">
                        <img loading="lazy" src="{{ $trt->image }}" alt="Image-bike">
                    </div>
                    <div class="title-sale2">
                        <h3>{{ $trt->name_trt }}</h3>
                        <h4 class="price">Preț: {{ $trt->price_trt }} MDL</h4>
                        <h4 class="color">Culoarea: {{ $trt->color_trt }}</h4>
                        <h4 class="stock">Este in stoc</h4>
                        <div class="button-send">
                            <a href="{{ route("trotinete-details", $trt->id) }}">Detalii</a>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="trotinete_id" value="{{ $trt->id }}">
                            <div class="button-send">
                            <button type="submit" class="add-to-cart-btn">Adaugă în coș</button>
                            </div>
                        </form>

                        <form action="{{ route('favorites.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="trotinete_id" value="{{ $trt->id }}">
                            <div class="button-send">
                            <button type="submit" class="add-to-cart-btn">Adaugă la favorite</button>
                            </div>
                        </form>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
