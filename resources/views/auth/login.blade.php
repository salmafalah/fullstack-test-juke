@extends('layouts.guest')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                            <span class="d-none d-lg-block">Login</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                               <h5 class="text-center pb-0 fs-4">Login to Your Account</h5>
                               <p class="text-center small">Enter your Username & Password to login</p>
                            </div>

                            <form method="POST" action="{{ url('loginPost') }}" class="row g-3 needs-validation">
                               @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                    @error('username')
                                    <span role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="password">Password</label>
                                    <input id="password" class="block mt-1 w-full form-control"
                                        type="password" name="password" required/>
                                    @error('password')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <div class="col-12">
                                        <button class="ml-4 btn btn-primary w-100">
                                                {{ __('Log in') }}            
                                        </button>
                                    </div>
                                    @error('login')
                                        <span role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
