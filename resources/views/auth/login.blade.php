@extends('layouts.app')

@section('content')
    <section class="Login_form">
        <div class="bg">
            <div class="bg-img">
                <div class="Lbox ">
                    <div class=" contact-us-content inner-box rounded-3 border-light  text-light m-0">
                        <h2 class="text-center text-light pb-5">Login</h2>
                        <form class="">
                            <div class="mb-3 field">
                                <label for="exampleInputEmail1" class="form-label form_label">Email or Phone</label>
                                <input type="email" class="form-control input_custom" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Email or Phone" />
                            </div>
                            <div class="mb-3 field">
                                <label for="exampleInputPassword1" class="form-label form_label">Password</label>
                                <!-- <input type="password" class="form-control input_custom" id="exampleInputPassword1"
                                        placeholder="Password*" /> -->
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control input_custom" placeholder="Password"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text input_custom_eye" id="basic-addon2"><i
                                                class="fa-solid fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="password  mb-4 text-end fw-bolder">
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
@endsection
