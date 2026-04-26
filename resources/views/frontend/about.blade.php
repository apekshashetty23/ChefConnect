<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>About Us | ChefConnect</title>
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

/* HERO */
.about-hero {
    height: 60vh;
    background: url('assets/biryani.jpg') center/cover no-repeat;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.about-hero::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7));
}

.about-hero-content {
    position: relative;
    color: white;
    z-index: 2;
    animation: fadeDown 1s ease;
}

@keyframes fadeDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* SECTION */
.about-section {
    margin-top: 60px;
}

/* IMAGE */
.about-section img {
    transition: transform 0.4s ease;
}

.about-section img:hover {
    transform: scale(1.05);
}

/* CARDS */
.about-card {
    background: rgba(255,255,255,0.6);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    padding: 30px;
    transition: 0.3s;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.about-card i {
    font-size: 30px;
    color: #dc3545;
    margin-bottom: 10px;
}

.about-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

/* FADE-IN */
.fade-in {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeUp 0.8s forwards;
}

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* FOOTER */
.footer {
    background: #111;
    color: #fff;
    padding: 50px 0;
    margin-top: 60px;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
}

.footer h3, .footer h4 {
    font-weight: 600;
}

.footer a {
    color: #ccc;
    text-decoration: none;
    transition: 0.3s;
}

.footer a:hover {
    color: #fff;
}

.footer-social i {
    font-size: 18px;
    transition: 0.3s;
}

.footer-social i:hover {
    transform: scale(1.3);
    color: #dc3545;
}

.footer-bottom {
    text-align: center;
    margin-top: 25px;
    border-top: 1px solid #444;
    padding-top: 10px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
<div class="container">
<a class="navbar-brand fw-bold text-danger" href="/">ChefConnect</a>

<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="nav">
<ul class="navbar-nav gap-3">
<li><a class="nav-link" href="/">Home</a></li>
<li><a class="nav-link active fw-semibold text-danger" href="about">About Us</a></li>
<li><a class="nav-link" href="recipes">Recipes</a></li>
<li><a class="nav-link" href="contact">Contact</a></li>
</ul>
</div>
</div>
</nav>

<div style="margin-top:80px;"></div>

<!-- HERO -->
<section class="about-hero">
<div class="about-hero-content">
<h1 class="display-5 fw-bold">About ChefConnect</h1>
<p class="lead">Connecting food lovers through passion & creativity</p>
</div>
</section>

<!-- ABOUT -->
<section class="about-section container">

<div class="row align-items-center mb-5 fade-in">
<div class="col-md-6">
<h2>Who We Are</h2>
<p>
ChefConnect is a community-driven platform built for food lovers.
From home chefs to enthusiasts, users can share recipes, explore cuisines,
and connect through cooking.
</p>
</div>

<div class="col-md-6 text-center">
<img src="assets/ourteam.jpg" class="img-fluid rounded-4 shadow">
</div>
</div>

<div class="row text-center">

<div class="col-md-6 mb-4 fade-in" style="animation-delay: 0.2s;">
<div class="about-card">
<i class="fas fa-eye"></i>
<h3>Our Vision</h3>
<p>
To become a global food community where everyone can explore and share.
</p>
</div>
</div>

<div class="col-md-6 mb-4 fade-in" style="animation-delay: 0.4s;">
<div class="about-card">
<i class="fas fa-bullseye"></i>
<h3>Our Mission</h3>
<p>
To inspire and empower people to cook, share, and connect through food.
</p>
</div>
</div>

</div>

</section>

<!-- FOOTER -->
<footer class="footer">
<div class="container footer-container">

<div class="footer-brand">
<h3>ChefConnect</h3>
<p>Cook • Share • Inspire</p>
<p class="footer-desc">
A platform where recipes bring people together.
</p>
</div>

<div class="footer-links">
<h4>Quick Links</h4>
<ul class="list-unstyled">
<li><a href="home">Home</a></li>
<li><a href="about">About Us</a></li>
<li><a href="recipes">Recipes</a></li>
<li><a href="contact">Contact</a></li>
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

</body>
</html>