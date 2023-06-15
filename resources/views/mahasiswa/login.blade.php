<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{  asset('mahasiswa/login/style.css') }}">
    <title>Login Mahasiswa - Sistem Informasi Akademik</title>
</head>

<body>
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('logo_politani.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    POLITANI SAMARINDA</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on
                    this platform.</small>
            </div>
            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <h1 class="">Sign In</h1>
                    <p class="">Log in to your account to continue.</p>
                    @if(Session::has('loginError'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('loginError') }}
                    </div>
                    @endif
                    <form class="text-left" method="POST" action="{{ route('mahasiswa.store') }}">
                        @csrf
                        <div id="nim-field" class="input-group mb-3">
                            <input id="nim" name="nim" type="text" class="form-control form-control-lg bg-light fs-6"
                                placeholder="NIM" autofocus required>
                        </div>
                        <div class="input-group mb-1">
                            <input id="password" name="password" type="password" class=" form-control form-control-lg
                                bg-light fs-6" placeholder="Password">
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Remember
                                        Me</small></label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-primary" value="">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>