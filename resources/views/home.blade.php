<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <title>MecaNote</title>
  </head>
  <body id="home">
    <!--  navbar-->
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color: rgb(252, 216, 16)">
      <div class="container">
        <a class="navbar-brand" href="#">MecaNote</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Me</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!--  akhirnavbar-->

    <!-- jumbotron -->
    <section class="jumbotron text-center">
      <img src="{{ asset('assets/img/rr.jpeg') }}" alt="MecaNote" width="200" class="rounded-circle img-thumbnail" />
      <h1 class="display-4">MecaNote</h1>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,160L60,138.7C120,117,240,75,360,69.3C480,64,600,96,720,128C840,160,960,192,1080,202.7C1200,213,1320,203,1380,197.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
        ></path>
      </svg>
      <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> -->
    </section>
    <!-- akhir jumbotron -->

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>About MecaNote</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-4">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum temporibus, debitis ipsa neque vel rerum! Officia quia corporis totam voluptatibus?</p>
          </div>
          <div class="col-4">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam error quas alias enim, mollitia repudiandae nam, maxime pariatur distinctio, nostrum sint officia! Veniam, blanditiis vitae!</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir About -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
