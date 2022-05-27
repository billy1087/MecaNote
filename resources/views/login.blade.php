<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/login1.css') }}" />

    <title>Meca Note</title>
    <style>
        body {
            background-image: url("https://www.desktopbackground.org/download/1920x1080/2013/08/04/618044_orange-abstract-backgrounds-vector_5000x4000_h.jpg");
        }

    </style>
</head>

<body>
    <div class="container">

        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">L O G I N</h1>
                <div class="text">
                    <form method="post" action="/login">
                        @csrf
                        @if (session()->has('loginGagal'))
                            <p class="text-danger fw-bold py-1 my-0">
                                {{ session('loginGagal') }}
                            </p>
                        @endif
                        <div class="form-group mb-3 mt-0">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-warning mb-4">Login</button>
                            <h6>OR</h6>
                            <a href="/registrasi" class="btn btn-warning"> Registrasi</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
