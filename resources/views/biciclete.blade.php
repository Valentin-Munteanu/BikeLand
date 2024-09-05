@extends("loyaut")
@section("title", "Biciclete")
@section("content")
<div class="page-container">
    <div class="filters">
        <h2>Filtrează Bicicletele</h2>
        <form action="{{ route('biciclete') }}" method="GET">
            <div>
                <label for="name_bike">Nume Bicicletă:</label>
                <input type="text" name="name_bike" id="name_bike" value="{{ request('name_bike') }}">
            </div>

            <div>
                <label for="type_bike">Tipul de Bicicletă:</label>
                <input type="text" name="type_bike" id="type_bike" value="{{ request('type_bike') }}">
            </div>
            <div>
                <label for="color_bike">Culoare:</label>
                <input type="text" name="color_bike" id="color_bike" value="{{ request('color_bike') }}">
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
        @if($bikes->isEmpty())
            <p class="no-exist">Nu există biciclete disponibile.</p>
        @else
            @foreach ($bikes as $bike)
                <div class="bike-sale2">
                    <div class="img-sale2">
                        <img loading="lazy" src="{{ $bike->image_bike }}" alt="Image-bike">
                    </div>
                    <div class="title-sale2">
                        <h3>{{ $bike->name_bike }}</h3>
                        <h4 class="price">Preț: {{ $bike->price }} MDL</h4>
                        <h4 class="color">Culoarea: {{ $bike->color_bike }}</h4>
                        <h4 class="stock">Este in stoc</h4>
                        <div class="button-send">
                            <a href="{{ route('bike-details', $bike->id) }}">Detalii</a>
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                            <div class="button-send">
                            <button type="submit" class="add-to-cart-btn">Adaugă în coș</button>
                            </div>
                        </form>

                        <form action="{{ route('favorites.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bikes_id" value="{{ $bike->id }}">
                            <div class="button-send">
                            <button type="submit" class="add-to-cart-btn">Adaugă în favorite</button>
                            </div>
                        </form>


                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
