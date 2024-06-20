@extends('layouts.app')

@section('content')
<section class="Login_form">
    <div class="bg">
        <div class="bg-img">
            <div class="Lbox ">
                <div class="contact-us-content inner-box rounded-3 border-light text-light m-0">
                    <h2 class="text-center text-light pb-5">Login</h2>
                    <form method="POST" action="{{ route('login') }}" class="login">
                        @csrf
                        <div class="mb-3 field">
                            <label for="email" class="form-label form_label">Email or Phone</label>
                            <input type="text" class="form-control input_custom" name="email" id="email"
                                aria-describedby="emailHelp" placeholder="Email or Phone" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 field">
                            <label for="password" class="form-label form_label">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control input_custom" name="password"
                                    id="password" placeholder="Password" aria-label="Password"
                                    aria-describedby="togglePassword">
                                <div class="input-group-append">
                                    <span class="input-group-text input_custom_eye" id="togglePassword"><i
                                            class="fa-solid fa-eye"></i></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="password mb-4 text-end fw-bolder">
                            <span class="forgot_pass">Forgot Password?</span>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn text-white align-items-center">
                                <p class="text-light">Login</p>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#togglePassword').on('click', function() {
        const passwordInput = $('#password');
        const icon = $(this).find('i');
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});
</script>
@endsection