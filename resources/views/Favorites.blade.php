@extends("loyaut")
@section("title", "Favoritele mele")
@section('content')
<div class="container">
    <h1>Favoritele mele</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($favoritesItems->isEmpty())
        <p>Nu ai niciun produs în favorite.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Produs</th>
                    <th>Preț</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($favoritesItems as $item)
                    @php
                        $itemPrice = 0;
                        if($item->bikeRelation) {
                           $itemPrice = $item->bikeRelation->price;
                        } elseif($item->trotineteRelation) {
                         $itemPrice = $item->trotineteRelation->price_trt;
                        } elseif($item->accesoriiRelation) {
                            $itemPrice = $item->accesoriiRelation->price;
                        }
                    @endphp
                    <tr class="favorites-item">
                        <td>
                            <div class="image">
                                @if($item->bikeRelation)
                                    <img src="{{ $item->bikeRelation->image_bike }}" alt="Imagine bicicletă" style="width: 100px;">
                                @elseif($item->trotineteRelation)
                                    <img src="{{ $item->trotineteRelation->image }}" alt="Imagine trotinetă" style="width: 100px;">
                                @elseif($item->accesoriiRelation)
                                    <img src="{{ $item->accesoriiRelation->image }}" alt="Imagine accesoriu" style="width: 100px;">
                                @endif
                            </div>
                            <div class="details">
                                @if($item->bikeRelation)
                                    <h4>{{ $item->bikeRelation->name_bike }}</h4>
                                @elseif($item->trotineteRelation)
                                    <h4>{{ $item->trotineteRelation->name_trt }}</h4>
                                @elseif($item->accesoriiRelation)
                                    <h4>{{ $item->accesoriiRelation->name_acces }}</h4>
                                @endif
                            </div>
                        </td>
                        <td>{{ $itemPrice }} MDL</td>
                        <td class="actions">
                            <form action="{{ route("favorites-remove", $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Șterge din favorite</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
