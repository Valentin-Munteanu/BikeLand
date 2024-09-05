@extends("loyaut")
@section("title", "Autentificare/Logare")
@section("content")
    <div class="login_form">
    <h2>Intră in cont</h2>
        <div class="auth_login">
            <form action="{{route("user-login")}}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Login" value="{{old("login", $lastLogin)}}">
            @error("login")
<p class="errors">{{$message}}</p>

            @enderror
            <div class="password-container">
            <input type="password" name="password" id="password" placeholder="Parola" >
                <span class="toggle-password" onclick="passwordVisible(this)"><i class="fas fa-eye-slash"></i></span>
            </div>
            @error("password")
            <p class="errors">{{$message}}</p>

            @enderror
            <h4>Nu ieși din cont </h4>
            <input type="checkbox" name="remember" id="remember" >
  <div class="button-send">
      <button type="submit">Autentificare</button>

  </div>
<div class="change-pass">
    <a href="{{route("change-view")}}">Am uitat parola</a>
</div>
            </form>
        </div>
    </div>



<div class="despre">
    <h2>BikeLand, cele mai calitative biciclete</h2>
    </div>


<div class="background2">
<img src="{{asset("Images/D9.png")}}" alt="">
<div class="text-back">
<p>La BikeLand, pasiunea noastră pentru biciclete ne impulsionează să oferim clienților cele mai bune produse și servicii. Fie că ești un ciclist dedicat, un navetist de zi cu zi sau cineva în căutarea unei noi aventuri pe două roți, la BikeLand vei găsi bicicleta perfectă pentru orice nevoie.</p>

</div>
</div>


<div class="background2">
    <p>BIKELAND este locul ideal pentru iubitorii de biciclete, indiferent de nivelul de experiență. În magazinul nostru oferim o gamă variată de biciclete, accesorii și echipamente de înaltă calitate, menite să răspundă nevoilor oricărui ciclist. Fie că ești un pasionat al traseelor montane, un navetist în căutare de eficiență urbană sau doar cineva care vrea să exploreze natura, la BIKELAND găsești soluții personalizate și consultanță specializată. Misiunea noastră este să îți oferim suportul necesar pentru a te bucura de fiecare călătorie pe două roți.</p>
    <div class="text-back">
    <img src="https://avatars.mds.yandex.net/i?id=da47da8e02bb69f36ffa9ea9e03fded8_l-9220933-images-thumbs&n=13" alt="">

    </div>
    </div>

<script src="{{asset("VisiblePassword/visiblePass.js")}}"></script>
@endsection
