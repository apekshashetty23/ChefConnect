<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | Recipes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f8f9fa;
}

/* NAVBAR */
.navbar {
    backdrop-filter: blur(10px);
}

/* CATEGORY BUTTON */
.category-btn {
    border-radius: 50px;
    padding: 6px 18px;
    transition: all 0.3s ease;
}

.category-btn:hover {
    transform: translateY(-2px) scale(1.05);
}

/* RECIPE CARD */
.recipe-card {
    border-radius: 15px;
    overflow: hidden;
    background: #fff;
    transition: all 0.35s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.recipe-card img {
    height: 220px;
    width: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.recipe-card:hover img {
    transform: scale(1.08);
}

.recipe-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

/* FADE-IN ANIMATION */
.fade-in {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s forwards;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* FOOTER */
.footer {
    background: #111;
    color: #fff;
    padding: 60px 0 25px;
    margin-top: 70px;
}

.footer h3,
.footer h5 {
    color: #fff;
    margin-bottom: 18px;
}

.footer p {
    color: #ccc;
    line-height: 1.7;
}

.footer a {
    color: #ccc;
    text-decoration: none;
    transition: 0.3s ease;
}

.footer a:hover {
    color: #ff4d5a;
    padding-left: 4px;
}

.footer-bottom {
    border-top: 1px solid #333;
    padding-top: 18px;
    text-align: center;
    color: #aaa;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
<div class="container">
<a class="navbar-brand fw-bold text-danger" href="{{ url('/') }}">ChefConnect</a>

<div class="collapse navbar-collapse justify-content-end">
<ul class="navbar-nav gap-3">
<li><a class="nav-link" href="{{ url('/') }}">Home</a></li>
<li><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
<li><a class="nav-link active fw-semibold text-danger" href="{{ url('/recipes') }}">Recipes</a></li>
<li><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
</ul>
</div>
</div>
</nav>

<div style="margin-top:90px;"></div>

<!-- CATEGORY FILTER -->
<section class="container mb-4">
<div class="d-flex flex-wrap gap-2 justify-content-center">

<a href="{{ route('frontend.recipes') }}"
   class="btn category-btn {{ request('category') ? 'btn-outline-danger' : 'btn-danger' }}">
   All
</a>

@foreach($categories as $cat)
<a href="?category={{ $cat->id }}"
   class="btn category-btn {{ request('category') == $cat->id ? 'btn-danger' : 'btn-outline-secondary' }}">
   {{ $cat->category }}
</a>
@endforeach

</div>
</section>

<!-- RECIPES -->
<section class="container">
<div class="row g-4">

@if($recipes->isEmpty())
<div class="text-center mt-5">
<h4>No recipes found 😢</h4>
</div>
@endif

@foreach($recipes as $index => $recipe)
<div class="col-lg-4 col-md-6 fade-in" style="animation-delay: {{ $index * 0.2 }}s;">
<div class="recipe-card">

<img src="{{ asset('uploads/recipes/'.$recipe->image) }}" 
     alt="{{ $recipe->title }}">

<div class="p-3">
<h5>{{ $recipe->title }}</h5>

<p class="text-muted small">
{{ Str::limit($recipe->description, 80) }}
</p>

<a href="{{ route('frontend.recipe.view', $recipe->id) }}" 
   class="btn btn-outline-danger btn-sm">
   View Recipe
</a>
</div>

</div>
</div>
@endforeach

</div>
</section>

<!-- FOOTER -->
<footer class="footer">
<div class="container">
<div class="row gy-4">

<!-- BRAND -->
<div class="col-lg-4 col-md-6">
<h3>ChefConnect</h3>
<p>Cook • Share • Inspire</p>
<p class="footer-desc">
A platform where recipes bring people together.
</p>
</div>

<!-- LINKS -->
<div class="col-lg-4 col-md-6">
<h4>Quick Links</h4>
<ul class="list-unstyled">
<li><a href="{{ url('/') }}">Home</a></li>
<li><a href="{{ url('/about') }}">About Us</a></li>
<li><a href="{{ url('/recipes') }}">Recipes</a></li>
<li><a href="{{ url('/contact') }}">Contact</a></li>
</ul>
</div>

<!-- SOCIAL -->
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
<p>&copy; 2026 ChefConnect • Made with love by Apeksha ❤️</p>
</div>

</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>