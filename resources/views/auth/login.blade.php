@extends('front.layouts.app')



@section("header-content")

    <div class="row mx ">
        <div class="col-12">
            <h1 class="text-start">Login:</h1>
        </div>
    </div>

@endsection


@section('content')


<section class="login-section">
    <div class="container">
        <div class="row mx-0">
            <div class="col-12 text-center">
                <img src="{{asset("web/assets/images/user-icon1.png")}}" alt="user login" class="login-icon">
            </div>
        </div>
        <div class="row mx-0 d-flex flex-row justify-content-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="row mx-0 mt-3">
                        <div class="col-12 text-end">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <button type="submit" class="btn btn-primary">Login</button>

                        </div>
                    </div>
                    <div class="row mx-0 mt-2">
                        <div class="col-12">
                           <p>New to Event Space!<a href="{{route('register')}}"> Create new account</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

















@endsection
