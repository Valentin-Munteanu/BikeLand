@extends("loyaut")
@section("title", "Autentificare/Logare")
@section("content")
    <div class="login_form">
    <h2>Intră in cont</h2>
        <div class="auth_login">
            <form action="{{route("admin-loginPost")}}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Login Admin">
            @error("login")
<p class="errors">{{$message}}</p>
            @enderror
            <div class="password-container">
            <input type="password" name="password" id="password" placeholder="Parola Admin" >
                <span class="toggle-password" onclick="passwordVisible(this)"><i class="fas fa-eye-slash"></i></span>
            </div>
            @error("password")
            <p class="errors">{{$message}}</p>

            @enderror
  <div class="button-send">
      <button type="submit">Autentificare</button>

  </div>
            </form>
        </div>
    </div>


<script src="{{asset("VisiblePassword/visiblePass.js")}}"></script>
@endsection
