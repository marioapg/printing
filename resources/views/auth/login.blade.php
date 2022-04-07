<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CN - Iniciar Sesión</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}">
    </head>

    <body>
        <div class="auth-layout-wrap" style="background-color:#F19B32;">
            <div class="auth-content">
                <div class="card o-hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-4">
                                <div class="auth-logo text-center mb-4">
                                    <img src="{{asset('assets/images/logo.png')}}" alt="">
                                </div>
                                <h1 class="mb-3 text-18 text-center">Inicio de sesión</h1>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group text-center">
                                        <label for="email">Email</label>
                                        <input id="email"
                                            class="form-control form-control-rounded @error('email') is-invalid @enderror text-center"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group text-center">
                                        <label for="password">Contraseña</label>
                                        <input id="password" type="password"
                                            class="form-control form-control-rounded @error('password') is-invalid @enderror text-center"
                                            name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group text-center">
                                        <div class="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recuérdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-rounded btn-block mt-2" style="background-color: #ED3123;color:white;">Iniciar sesión</button>

                                </form>
                                {{-- @if (Route::has('password.request'))

                                <div class="mt-3 text-center">

                                    <a href="{{ route('password.request') }}" class="text-muted"><u>Forgot
                                            Password?</u></a>
                                </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('assets/js/common-bundle-script.js')}}"></script>

        <script src="{{asset('assets/js/script.js')}}"></script>
    </body>

</html>
