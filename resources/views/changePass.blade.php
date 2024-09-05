@extends("loyaut")
@section("title", "Modificare Parola")
@section("content")
<div class="login_form">
    <div class="auth_login">
<h3>Modifică Parola</h3>
<form action="{{route("changePassword")}}" method="POST">
    @csrf
    @method("PUT")
    <div class="input-group">
        <input type="text" name="login" placeholder="Login" value="{{old("login", $lastLogin)}}">
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
        <button type="submit">Modifică parola</button>
    </div>
</form>

<script src="{{asset("VisiblePassword/visiblePass.js")}}"></script>

@endsection
