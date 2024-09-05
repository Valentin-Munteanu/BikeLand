@extends("loyaut")
@section("title", "Autentificare/Admin")
@section("content")
<div class="register_form">
    <div class="auth_user">
        <form action="{{ route("admin-registerPost") }}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Login Admin">
            @error('login')
                <p class="errors">{{ $message }}</p>
            @enderror

            <input type="text" name="name" placeholder="Numele Adminului">
            @error('name')
                <p class="errors">{{ $message }}</p>
            @enderror

            <input type="text" name="lastname" placeholder="Prenumele Adminului">
            @error('lastname')
                <p class="errors">{{ $message }}</p>
            @enderror

            <input type="text" name="email" placeholder="E-mailul Adminului">
            @error('email')
                <p class="errors">{{ $message }}</p>
            @enderror

            <div class="password-container2">
                <input type="password" name="password" id="password" placeholder="Parola Adminului">
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
            <h3>Ai deja un cont Admin ?</h3>
            <p>Accesează pagina de:</p>
            <a href="{{ route("admin-login") }}">Autentificare</a>
        </div>
    </div>

<script src="{{ asset('VisiblePassword/visiblePass.js') }}"></script>
@endsection
