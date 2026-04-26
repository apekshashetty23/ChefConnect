<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | Contact Us</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
.navbar { backdrop-filter: blur(10px); }

.about-hero {
    height: 45vh;
    background: url('assets/biryani.jpg') center/cover no-repeat;
    display: flex; align-items: center; justify-content: center;
    text-align: center; position: relative;
}
.about-hero::before {
    content: ""; position: absolute; inset: 0;
    background: rgba(0,0,0,0.6);
}
.about-hero h1, .about-hero p { position: relative; color: #fff; }

.contact-box {
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(12px);
    border-radius: 20px;
    padding: 30px;
    transition: 0.3s;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.contact-box:hover { transform: translateY(-5px); }

.form-control { border-radius: 10px; }
.form-control:focus {
    box-shadow: 0 0 10px rgba(220,53,69,0.3);
    border-color: #dc3545;
}

.error-text {
    color: #dc3545;
    font-size: 0.85rem;
    display: none;
}

.btn-danger { border-radius: 30px; transition: 0.3s; }
.btn-danger:hover { transform: scale(1.05); }

#submitBtn:disabled {
    opacity: 0.7;
    transform: scale(0.98);
}

.footer {
    background: #111; color: #fff;
    padding: 40px 0; margin-top: 50px;
}
.footer-bottom {
    text-align: center;
    border-top: 1px solid #444;
    margin-top: 20px;
    padding-top: 10px;
}
</style>
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top bg-white shadow-sm">
<div class="container">

<a class="navbar-brand fw-bold text-danger" href="/">ChefConnect</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse justify-content-end" id="nav">
<ul class="navbar-nav gap-3">
<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
<li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
<li class="nav-item"><a class="nav-link" href="recipes">Recipes</a></li>
<li class="nav-item"><a class="nav-link active fw-semibold text-danger" href="contact">Contact</a></li>
</ul>
</div>

</div>
</nav>

<div style="margin-top:80px;"></div>

<!-- HERO -->
<section class="about-hero">
<div>
<h1 data-aos="fade-down">Contact Us</h1>
<p data-aos="fade-up" data-aos-delay="200">We’d love to hear from you</p>
</div>
</section>

<!-- CONTACT -->
<section class="container my-5">
<div class="row g-5 align-items-center">

<!-- LEFT -->
<div class="col-lg-5" data-aos="fade-right">
<h3 class="fw-bold text-danger">Get In Touch</h3>
<p class="text-muted">Questions, feedback, or recipe ideas?</p>
<p><i class="fa fa-envelope text-danger me-2"></i> chefconnect@gmail.com</p>
<p><i class="fa fa-phone text-danger me-2"></i> +91 98765 43210</p>
</div>

<!-- FORM -->
<div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
<div class="contact-box" data-aos="zoom-in" data-aos-delay="300">

<form id="contactForm" action="{{ route('store-feedback') }}" method="POST">
@csrf

<input id="name" class="form-control mb-1" name="name" placeholder="Your Name">
<div class="error-text" id="nameError">Name is required</div>

<input id="email" class="form-control mb-1 mt-3" name="email" placeholder="Your Email">
<div class="error-text" id="emailError">Valid email required</div>

<textarea id="message" class="form-control mb-1 mt-3" name="message" rows="4" placeholder="Your Message"></textarea>
<div class="error-text" id="messageError">Message required (min 10 chars)</div>

<button id="submitBtn" class="btn btn-danger px-4 mt-3">
<span id="btnText">Send Message</span>
<span id="btnLoader" class="spinner-border spinner-border-sm ms-2 d-none"></span>
</button>

</form>

</div>
</div>

</div>
</section>

<footer class="footer text-center">
<h3>ChefConnect</h3>
<p>Cook • Share • Inspire</p>
<div class="footer-bottom">
<p>&copy; ChefConnect • Made with love by Apeksha</p>
</div>
</footer>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// VALIDATION
document.getElementById("contactForm").addEventListener("submit", function(e){
let valid = true;

let name = document.getElementById("name").value.trim();
let email = document.getElementById("email").value.trim();
let message = document.getElementById("message").value.trim();

document.querySelectorAll(".error-text").forEach(el => el.style.display="none");

if(name === ""){
document.getElementById("nameError").style.display="block";
valid = false;
}

if(!/^\S+@\S+\.\S+$/.test(email)){
document.getElementById("emailError").style.display="block";
valid = false;
}

if(message.length < 10){
document.getElementById("messageError").style.display="block";
valid = false;
}

if(!valid){
e.preventDefault();
return;
}

// LOADER
const btn = document.getElementById("submitBtn");
const text = document.getElementById("btnText");
const loader = document.getElementById("btnLoader");

btn.disabled = true;
loader.classList.remove("d-none");
text.innerText = "Sending...";
});
</script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({
duration: 1200,
once: true,
easing: 'ease-in-out'
});
</script>

</body>
</html>