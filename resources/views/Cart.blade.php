@extends("loyaut")
@section("title", "Coșul de cumpărături")
@section('content')
<div class="container">
    <h1>Coșul tău de cumpărături</h1>

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

    @if($cartItems->isEmpty())
        <p>Coșul tău este gol.</p>
    @else

        <table class="table">
            <thead>
                <tr>
                    <th>Produs</th>
                    <th>Cantitate</th>
                    <th>Preț</th>
                    <th>Total</th>
                    <th>Acțiuni</th>
                </tr>
            </thead>
            <tbody>
                @php $totalPrice = 0; @endphp
                @foreach($cartItems as $item)
                    @php
                        $itemPrice = 0;
                        if($item->bike) {
                           $itemPrice = $item->bike->price;
                        } elseif($item->trotineta) {
                         $itemPrice = $item->trotineta->price_trt;
                        } elseif($item->accesoriu) {
                            $itemPrice = $item->accesoriu->price;
                        }
                        $totalPrice += $item->total_price;
                    @endphp
                    <tr class="cart-item">
                        <td>
                            <div class="image">
                                @if($item->bike)
                                    <img src="{{$item->bike->image_bike}}" alt="">
                                @elseif($item->trotineta)
                                    <img src="{{$item->trotineta->image}}" alt="">
                                @elseif($item->accesoriu)
                                    <img src="{{$item->accesoriu->image}}" alt="">
                                @endif
                            </div>
                            <div class="details">
                                @if($item->bike)
                                    <h4>{{ $item->bike->name_bike }}</h4>
                                @elseif($item->trotineta)
                                    <h4>{{ $item->trotineta->name_trt }}</h4>
                                @elseif($item->accesoriu)
                                    <h4>{{ $item->accesoriu->name_acces }}</h4>
                                @endif

                            </div>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $itemPrice }} MDL</td>
                        <td>{{ $item->total_price }} MDL</td>
                        <td class="actions">
                            <form action="{{ route('cart.increment', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">+</button>
                            </form>
                            <form action="{{ route('cart.decrement', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">-</button>
                            </form>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Șterge</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        <div class="total-price">
            <h3>Preț total: {{ $totalPrice }} MDL</h3>
        </div>
    @endif
</div>
@endsection
