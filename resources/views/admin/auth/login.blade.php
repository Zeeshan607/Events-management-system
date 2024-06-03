@extends('admin.layouts.default')

@section("title","Login:Admin")

@section('page')

<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back, Admin</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="{{asset("dashboard/assets/img/avatars/avatar.jpg")}}" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <div class="alert alert-info">
                                    <span><b>Note:</b> Admin credentials are prefilled just press login to get to the admin panel</span>
                                </div>
                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email')  is-invalid @enderror" name="email" value="admin@ems.com" readonly required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input id="password" type="password" value="Ems-2023"  class="form-control form-control-lg @error('password')  is-invalid @enderror"  readonly name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                        @if (Route::has('admin.password.request'))
                                            <small>
                                            <a  href="{{ route('admin.password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            </small>
                                        @endif

                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="form-check-label">
														Remember me next time
												</span>
                                        </label>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</submit>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>


















@endsection
