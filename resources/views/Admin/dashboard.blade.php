@extends("loyaut")
@section("title", "Contul meu/Admin")
@section("content")
<div class="user-dashbord">
    <h2>Contul Administratorului</h2>
    <div class="user_info">
        <h2>Bine ați venit</h2>
        <h3>"{{$admin->login}}"</h3>
        <p>Numele:"{{$admin->name}}"</p>
        <p>Prenumele: "{{$admin->lastname}}"</p>
        <i class="fa-solid fa-user"></i>
        <div class="button-send">
<a href="{{route("logout-admin")}}"><button>Ieși din cont</button></a>

        </div>
    </div>
</div>



<div class="login_form">
    <div class="auth_login">
<h3>Modifică Contul Admin</h3>
<form action="{{route("update-admin")}}" method="POST">
    @csrf
    @method("PUT")
    <div class="input-group">
        <input type="text" name="login" value="{{old("login", $admin->login)}}">
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
    <h3>Ștergere cont Admin</h3>
    <form action="{{ route("delete-admin") }}" method="POST" onsubmit="return confirm('Sigur doriți să ștergeți contul?');">
        @csrf
        @method('DELETE')
        <div class="button-send">
            <button type="submit" >Șterge contul</button>
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

