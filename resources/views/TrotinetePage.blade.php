@extends("loyaut")
@section("title", "$trotinete->name_trt")
@section("content")
<div class="oferte-div">
    <h2 class="despre-txt">Despre micro-vehicul: {{$trotinete->name_trt}}</h2>
</div>
<div class="despre-bicicleta">
  <img src="{{ asset($trotinete->image) }}" alt="BikesImage">

  <div class="bike-details">
    <h3>{{ $trotinete->name_trt }}</h3>
    <h3>Viteza trotinetei:{{$trotinete->speed_trt}}</h3>
    <h4 class="price">Prețul: {{ $trotinete->price_trt }} MDL</h4>
    <h4 class="color">Culoarea: {{ $trotinete->color_trt }}</h4>
    <h4 class="stock">Este în stoc</h4>
    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="trotinete_id" value="{{ $trotinete->id }}">
        <div class="button-send">
        <button type="submit" class="add-to-cart-btn">Adaugă în coș</button>
        </div>
    </form>

    <form action="{{ route('favorites.add') }}" method="POST">
        @csrf
        <input type="hidden" name="trotinete_id" value="{{ $trotinete->id }}">
        <div class="button-send">
        <button type="submit" class="add-to-cart-btn">Adaugă la favorite</button>
        </div>
    </form>


    <div class="button-dropdown">
      <button id="toggleDescription">Caracteristici</button>
      <ul class="description-content">
        <li>{{ $trotinete->description }}</li>
      </ul>
    </div>
  </div>
</div>



<br>
<div class="oferte-div">
    <h2>Oferte de vânzare</h2>
</div>
<div class="bike-saleDashboard">
    <div class="img-saleDashboard">
        <div class="title-saleDashboard">
            <img src="https://assets.zeg.de/1050x700/km119-iakw50.png" alt="">
            <h3>Kettler TRAVELLER 27G</h3>
                <p>23000 MDL</p>
                <h4>20000 MDL</h4>
            <h4 class="stock">Este in stoc</h4>
            <button class="detalii-btn">Vezi detalii</button>
        </div>
    </div>
    <div class="pop-up" id="pop-up">
        <div class="pop-up-content">
            <span class="close">&times;</span>
            <img src="https://assets.zeg.de/1050x700/km119-iakw50.png" alt="">
            <h3>Kettler TRAVELLER 27G</h3>
            <ul>
                <li>Tip: Bicicletă de trekking</li>
                <li>Dimensiune cadru: Disponibilă în mai multe dimensiuni, de obicei între 45 cm și 60 cm.</li>
                <li>Material cadru: Aluminiu.</li>
                <li>Furcă: Suspensie față.</li>
                <li>Diametrul roților: 28 inch.</li>
                <li>Anvelope: De trekking.</li>
                <li>Număr viteze: 27 viteze.</li>
                <li>Transmisie: Shimano Deore sau Altus.</li>
                <li>Frâne: Frâne pe disc hidraulice.</li>
            </ul>
        </div>
    </div>

    <div class="img-saleDashboard">
        <div class="title-saleDashboard">
            <img src="https://avatars.mds.yandex.net/get-mpic/4331935/img_id4334118778695745133.jpeg/orig" alt="">
            <h3>Bulls Sharptail</h3>
            <p>20000 MDL</p>
            <h4>15000 MDL</h4>
        <h4 class="stock">Este in stoc</h4>
<button class="detalii-btn2">Vezi detalii</button>
        </div>
    </div>

    <div class="pop-up2" id="pop-up2">
        <div class="pop-up-content">
            <span class="close2">&times;</span>
            <img src="https://avatars.mds.yandex.net/get-mpic/4331935/img_id4334118778695745133.jpeg/orig" alt="">
            <h3>Bulls Sharptail</h3>
            <ul>
                <li>Tip: Bicicletă MTB (mountain bike) hardtail.</li>
                <li>Material cadru: Aluminiu ușor, optimizat pentru rezistență și manevrabilitate.</li>
                <li>Dimensiune cadru: Disponibil în mai multe dimensiuni.</li>
                <li>Diametrul roților: De obicei, 27.5 inch sau 29 inch. </li>
                <li>Furcă: Suspensie față, de obicei de la Suntour, cu o cursă între 100 mm și 120 mm.</li>
                <li>Anvelope: Anvelope de MTB, cu crampoane mar.</li>
                <li>Număr viteze: 24 sau 27 viteze, de obicei cu 3 foi în față și 8/9 pinioane în spate.</li>
                <li>Transmisie: Shimano Altus sau Shimano Acera. </li>
                <li>Frâne: Frâne pe disc mecanice sau hidraulice (în funcție de model).</li>
            </ul>
        </div>
    </div>


    <div class="img-saleDashboard">
        <div class="title-saleDashboard">
            <img src="https://cloudinary.pondigital.solutions/pon-digital-solutions/image/upload/q_auto,f_auto,e_trim/dmp.pon.bike/6000_EJ3yRgtM9W276PfA.png?v1" alt="">
            <h3>Focus Jarifa 6.7 </h3>
            <p>27000 MDL</p>
            <h4>23000 MDL</h4>
        <h4 class="stock">Este in stoc</h4>
<button class="detalii-btn3">Vezi detalii</button>
        </div>
    </div>
    <div class="pop-up3" id="pop-up3">
        <div class="pop-up-content">
            <span class="close3">&times;</span>
            <img src="https://cloudinary.pondigital.solutions/pon-digital-solutions/image/upload/q_auto,f_auto,e_trim/dmp.pon.bike/6000_EJ3yRgtM9W276PfA.png?v1" alt="">
            <h3>Focus Jarifa 6.7 </h3>
            <ul>
                <li>Tip: E-bike (bicicletă electrică) de tip MTB hardtail.</li>
                <li>Material cadru: Aluminiu, rezistent și ușor.</li>
                <li>Dimensiune cadru: Disponibilă în mai multe dimensiuni, de la S la XL.</li>
                <li>Diametrul roților: 29 inch. </li>
                <li>Motor: Bosch Performance Line, cu un cuplu de 65 Nm.</li>
                <li>Baterie: Bosch PowerTube 500 Wh, integrată în cadru, cu o autonomie de aproximativ 80-120 km.</li>
                <li>Furcă: Suspensie față, de obicei cu o cursă de 100 mm (în mod frecvent de la Suntour).</li>
                <li>Anvelope: Schwalbe Smart Sam 29x2.25, proiectate pentru trasee off-road.</li>
                <li>Număr viteze: 9 viteze, cu un schimbător Shimano Altus.</li>
                <li>Transmisie: Shimano Altus sau Shimano Acera. </li>
                <li>Frâne: Frâne pe disc hidraulice Shimano MT200.</li>
            </ul>
        </div>
    </div>

</div>


<script src="{{asset("PopUp/popUps.js")}}"></script>
<script src="{{asset("PopUp/popup.js")}}"></script>
<script src="{{asset("PopUp/popupC.js")}}"></script>
<script src="{{asset("Dropdown/dropdown.js")}}"></script>
@endsection
