@extends("loyaut")
@section("title", "Autentificare")
@section("content")
<div class="register_form">
    <div class="auth_user">
        <form action="{{ route('register-user') }}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Login">
            @error('login')
                <p class="errors">{{ $message }}</p>
            @enderror

            <input type="text" name="name" placeholder="Numele">
            @error('name')
                <p class="errors">{{ $message }}</p>
            @enderror

            <input type="text" name="lastname" placeholder="Prenumele">
            @error('lastname')
                <p class="errors">{{ $message }}</p>
            @enderror

            <input type="text" name="email" placeholder="E-mail">
            @error('email')
                <p class="errors">{{ $message }}</p>
            @enderror

            <div class="password-container2">
                <input type="password" name="password" id="password" placeholder="Parola">
                @error('password')
                <p class="errors">{{ $message }}</p>
            @enderror
                <span class="toggle-password" onclick="passwordVisible(this)">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>

            <div class="password-container2">
                <input type="password" name="password_confirmation" id="password_confirm" placeholder="Confirmare Parola">
                @error('password_confirmation')
                <p class="errors">{{ $message }}</p>
            @enderror
                <span class="toggle-password" onclick="passwordConfirmVisible(this)">
                    <i class="fas fa-eye-slash"></i>
                </span>
            </div>

            <div class="button-send">
                <button type="submit">Înregistrează-te</button>
            </div>
        </form>

        <div class="login_div">
            <h3>Ai deja un cont?</h3>
            <p>Accesează pagina de:</p>
            <a href="{{ route('Login') }}">Autentificare</a>
        </div>
    </div>
</div>





<div class="despre">
    <h2>Despre noi</h2>
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

<script src="{{ asset('VisiblePassword/visiblePass.js') }}"></script>
@endsection
