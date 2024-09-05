@extends("loyaut")
@section('title', 'Rezultatele Căutării')
@section('content')

<div class="search-results">
    <h2>Rezultatele Căutării</h2>

    @if($bikes->isEmpty() && $accesorii->isEmpty() && $trotinete->isEmpty())
        <p>Nu au fost găsite produse care să corespundă căutării.</p>
    @else
        @if(!$bikes->isEmpty())
            <h3>Biciclete</h3>
            @foreach($bikes as $bike)
                <div class="product-item">
                    <img src="{{ $bike->image_bike }}" alt="{{ $bike->name_bike }}">
                    <h3>{{ $bike->name_bike }}</h3>
                    <p>Preț: {{ $bike->price }} MDL</p>
                    <a href="{{ route("bike-details", $bike->id) }}">Vezi Detalii</a>
                </div>
            @endforeach
        @endif

        @if(!$accesorii->isEmpty())
            <h2>Accesorii</h2>
            @foreach($accesorii as $accesoriu)
                <div class="product-item">
                    <img src="{{ $accesoriu->image }}" alt="{{ $accesoriu->name_acces }}">
                    <h3>{{ $accesoriu->name_acces }}</h3>
                    <p>Preț: {{ $accesoriu->price }} MDL</p>
                    <a href="{{ route("accesorii-details", $accesoriu->id) }}">Vezi Detalii</a>
                </div>
            @endforeach
        @endif

        @if(!$trotinete->isEmpty())
            <h2>Trotinete</h2>
            @foreach($trotinete as $trotineta)
                <div class="product-item">
                    <img src="{{ $trotineta->image }}" alt="{{ $trotineta->name_trt }}">
                    <h3>{{ $trotineta->name_trt }}</h3>
                    <p>Preț: {{ $trotineta->price_trt }} MDL</p>
                    <a href="{{ route("trotinete-details", $trotineta->id) }}">Vezi Detalii</a>
                </div>
            @endforeach
        @endif
    @endif
</div>

@endsection
