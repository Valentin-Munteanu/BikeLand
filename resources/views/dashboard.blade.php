@extends("loyaut")
@section("title", "Contul meu")
@section("content")
<div class="user-dashbord">
    <h2>Contul meu</h2>
    <div class="user_info">
        <h2>Bine ați venit</h2>
        <h3>"{{$user->login}}"</h3>
        <i class="fa-solid fa-user"></i>
        <div class="button-send">
<a href="{{route("logout")}}"><button>Ieși din cont</button></a>

        </div>
    </div>
</div>



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



<div class="login_form">
    <div class="auth_login">
<h3>Modifică Contul</h3>
<form action="{{route("user-update")}}" method="POST">
    @csrf
    @method("PUT")
    <div class="input-group">
        <input type="text" name="login" value="{{old("login", $user->login)}}">
        @error("login")
        <p class="errors">{{$message}}</p>
        @enderror

    </div>
    <div class="password-container">
        <input type="password" name="password" id="password" placeholder="Parola Nouă">
        <span class="toggle-password" onclick="passwordVisible(this)"><i class="fas fa-eye-slash"></i></span>
    </div>
    <div class="input-group">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmare Parola">

    </div>
    @error('password')
        <p class="errors">{{ $message }}</p>
    @enderror
    <div class="button-send">
        <button type="submit">Modifică</button>
    </div>
</form>
<div class="delete_account">
    <h3>Ștergere cont</h3>
    <form action="{{ route('user-delete') }}" method="POST" onsubmit="return confirm('Sigur doriți să ștergeți contul?');">
        @csrf
        @method('DELETE')
        <div class="button-send">
            <button type="submit" id="delete-user">Șterge contul</button>
        </div>
    </form>
</div>
    </div>
</div>
<script src="{{asset("VisiblePassword/visiblePass.js")}}"></script>
<script src="{{asset("PopUp/popUps.js")}}"></script>
<script src="{{asset("PopUp/popup.js")}}"></script>
<script src="{{asset("PopUp/popupC.js")}}"></script>
@endsection

