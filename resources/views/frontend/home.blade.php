<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ChefConnect | Home</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    /* NAVBAR */
    .navbar-brand img {
        border-radius: 50%;
    }

    /* HERO */
    .hero-section {
    height: 85vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}

.hero-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.5);
}
    .hero-section .container {
        position: relative;
        z-index: 2;
    }

    /* RECIPE CARD */
    .recipe-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        text-align: center;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .recipe-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .recipe-card h3 {
        padding: 15px;
        font-weight: 600;
    }

    .recipe-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    /* FOOTER */
    .footer {
        background: #111;
        color: #fff;
        padding: 40px 0;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 30px;
    }

    .footer h3, .footer h4 {
        color: #fff;
    }

    .footer a {
        color: #ccc;
        text-decoration: none;
    }

    .footer a:hover {
        color: #fff;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid #444;
        padding-top: 10px;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-danger" href="#">
      ChefConnect
      <link rel="icon" type="image/png" href="assets/ChatGPT Image Nov 8, 2025, 12_16_40 PM.png" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-3">
        <li class="nav-item"><a class="nav-link active fw-semibold text-danger" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="/recipes">Recipes</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero-section d-flex align-items-center text-center text-white">
  <div class="container" data-aos="fade-down">
    <h1 class="display-4 fw-bold">Cook • Share • Inspire</h1>
    <p class="lead mt-3">Discover and explore amazing recipes</p>
  </div>
</section>

<!-- RECIPES -->
<section class="container my-5 pt-5">
  <div class="row g-4">

    @if($recipes->isEmpty())
      <div class="text-center">
        <h5>No recipes available</h5>
      </div>
    @endif

    @foreach($recipes as $recipe)
    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
      <div class="recipe-card">

        <img src="{{ asset('uploads/recipes/'.$recipe->image) }}" 
             alt="{{ $recipe->title }}">

        <h3>{{ $recipe->title }}</h3>

        <a href="{{ route('frontend.recipe.view', $recipe->id) }}" 
           class="btn btn-outline-danger btn-sm mb-3">
           View Recipe
        </a>

      </div>
    </div>
    @endforeach

  </div>
</section>

<!-- FOOTER -->
<footer class="footer">
  <div class="container footer-container">

    <div>
      <h3>ChefConnect</h3>
      <p>Cook • Share • Inspire</p>
    </div>

    <div>
      <h4>Quick Links</h4>
      <ul class="list-unstyled">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About Us</a></li>
        <li><a href="/recipes">Recipes</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
    </div>

    <div>
      <h4>Follow Us</h4>
      <div class="d-flex gap-3">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-youtube"></i>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <p>&copy; ChefConnect • Made with love by Apeksha</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init({ duration: 1000, once: true });

  const images = [
    '{{ asset("assets/prawns.jpg") }}',
    '{{ asset("assets/Butter-Chickenrex-tbvz-mediumSquareAt3X.jpg") }}',
    '{{ asset("assets/biryani.jpg") }}'
  ];

  let i = 0;
  const hero = document.querySelector('.hero-section');

  function bgChange(){
    hero.style.backgroundImage = `url(${images[i]})`;
    i = (i + 1) % images.length;
  }

  bgChange();
  setInterval(bgChange, 4000);
</script>

</body>
</html>