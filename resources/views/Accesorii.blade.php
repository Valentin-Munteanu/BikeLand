@extends("loyaut")
@section("title", "Accesorii")
@section("content")
<div class="page-container">
    <div class="filters">
        <h2>Filtrează Accesorii</h2>
        <form action="{{ route("accesorii") }}" method="GET">
            <div>
                <label for="name_acces">Nume Accesoriu:</label>
                <input type="text" name="name_acces" id="name_acces" value="{{ request('name_acces') }}">
            </div>

            <div>
                <label for="speed_trt">Tipul de accesoriu:</label>
                <input type="text" name="type_acces" id="type_acces" value="{{ request('type_acces') }}">
            </div>
            <div>
                <label for="color_acces">Culoare:</label>
                <input type="text" name="color_acces" id="color_trt" value="{{ request('color_acces') }}">
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
        @if($accesorii->isEmpty())
            <p class="no-exist">Nu există accesorii disponibile.</p>
        @else
            @foreach ($accesorii as $acc)
                <div class="bike-sale2">
                    <div class="img-sale2">
                        <img loading="lazy" src="{{ $acc->image }}" alt="Image-bike">
                    </div>
                    <div class="title-sale2">
                        <h3>{{ $acc->name_acces }}</h3>
                        <h3>Accesoriu pentru:{{$acc->type_acces}}</h3>
                        <h4 class="price">Preț: {{ $acc->price }} MDL</h4>
                        <h4 class="color">Culoarea: {{ $acc->color_acces }}</h4>
                        <h4 class="stock">Este in stoc</h4>
                        <div class="button-send">
                            <a href="{{ route("accesorii-details", $acc->id) }}">Detalii</a>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                        <input type="hidden" name="accesorii_id" value="{{ $acc->id }}">
                            <div class="button-send">
                            <button type="submit" class="add-to-cart-btn">Adaugă în coș</button>
                            </div>
                        </form>
                        <form action="{{ route('favorites.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="accesorii_id" value="{{ $acc->id }}">
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
