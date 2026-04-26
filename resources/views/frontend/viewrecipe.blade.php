<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | {{ $recipe->title }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" href="{{ url('assets/logo.png') }}">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
body{
    font-family:'Poppins',sans-serif;
    background:#f5f7fa;
}

/* NAVBAR */
.navbar{
    backdrop-filter: blur(12px);
}

/* HERO */
.about-hero {
    height: 65vh;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;
    position:relative;
    background-size:cover;
    background-position:center;
}

.about-hero::after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.85));
}

.about-hero div{
    position:relative;
    z-index:2;
    animation: fadeUp 1s ease;
}

.about-hero h1{
    font-size:3.2rem;
    font-weight:700;
}

.about-hero p{
    font-size:1.2rem;
    opacity:0.9;
}

/* IMAGE */
.recipe-img{
    border-radius:20px;
    transition:0.4s;
}
.recipe-img:hover{
    transform:scale(1.04);
}

/* GLASS CARD */
.glass-card{
    background:rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);
    border-radius:20px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

/* INGREDIENTS */
.list-group-item{
    border:none;
    padding:10px 0;
    transition:0.3s;
}
.list-group-item:hover{
    transform:translateX(6px);
    color:#ff4d5a;
}

/* STEPS */
.step-card{
    border-radius:15px;
    background:#fff;
    transition:0.3s;
}
.step-card:hover{
    transform:translateY(-6px);
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

/* FOOTER (ENHANCED ✨) */
.footer{
    background:linear-gradient(135deg,#111,#1c1c1c);
    color:#fff;
    padding:60px 0 25px;
    margin-top:70px;
}

.footer-container{
    max-width:1100px;
    margin:auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:30px;
}

.footer h3, .footer h4{
    margin-bottom:15px;
}

.footer p{
    color:#bbb;
    line-height:1.6;
}

.footer a{
    color:#bbb;
    text-decoration:none;
    transition:0.3s;
}

.footer a:hover{
    color:#ff4d5a;
    padding-left:5px;
}

/* SOCIAL ICONS */
.social-icons a{
    display:inline-block;
    margin-right:12px;
    font-size:18px;
    transition:0.3s;
}

.social-icons a:hover{
    transform:translateY(-3px) scale(1.2);
    color:#ff4d5a;
}

/* FOOTER BOTTOM */
.footer-bottom{
    text-align:center;
    margin-top:30px;
    border-top:1px solid #333;
    padding-top:15px;
    color:#aaa;
}

/* ANIMATION */
@keyframes fadeUp{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
<div class="container">
<a class="navbar-brand fw-bold text-danger" href="{{ url('/') }}">ChefConnect</a>
</div>
</nav>

<!-- HERO -->
<section class="about-hero"
style="background:
linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)),
url('{{ asset('uploads/recipes/'.$recipe->image) }}') center/cover no-repeat;">

<div>
<h1>{{ $recipe->title }}</h1>
<p>{{ $recipe->tagline }}</p>
</div>
</section>

<!-- MAIN -->
<section class="container my-5">
<div class="row g-5 align-items-center">

<div class="col-lg-6">
<img src="{{ asset('uploads/recipes/'.$recipe->image) }}"
class="img-fluid recipe-img shadow">
</div>

<div class="col-lg-6">
<div class="glass-card">

<h2 class="text-danger fw-bold">{{ $recipe->title }}</h2>
<p class="text-muted">{{ $recipe->description }}</p>

<hr>

<h4 class="fw-bold mb-3">Ingredients</h4>
<ul class="list-group list-group-flush">
@foreach($ingredients as $item)
<li class="list-group-item">{{ $item->ingredient }}</li>
@endforeach
</ul>

</div>
</div>

</div>
</section>

<!-- STEPS -->
<section class="container mb-5">
<h3 class="fw-bold text-danger mb-4">Preparation Method</h3>

@foreach($steps as $index => $step)
<div class="mb-3 p-4 step-card shadow-sm">
<h5 class="text-danger fw-bold">Step {{ $index + 1 }}</h5>
<p class="mb-0">{{ $step->step }}</p>
</div>
@endforeach

</section>

<!-- FOOTER -->
<footer class="footer">
<div class="footer-container">

<div class="footer-brand">
<h3>ChefConnect</h3>
<p>Cook • Share • Inspire</p>
<p class="footer-desc">
A community-driven platform where food lovers share recipes, discover new cuisines, and cook with passion.
</p>
</div>

<div class="footer-links">
<h4>Quick Links</h4>
<ul>
<li><a href="{{ url('/') }}">Home</a></li>
<li><a href="{{ url('/about') }}">About Us</a></li>
<li><a href="{{ url('/recipes') }}">Recipes</a></li>
<li><a href="{{ url('/contact') }}">Contact</a></li>
</ul>
</div>

<div class="footer-social">
<h4>Follow Us</h4>
<div class="social-icons">
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-facebook"></i></a>
<a href="#"><i class="fab fa-twitter"></i></a>
<a href="#"><i class="fab fa-youtube"></i></a>
</div>
</div>

</div>

<div class="footer-bottom">
<p>&copy; ChefConnect • Made with love by Apeksha</p>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>