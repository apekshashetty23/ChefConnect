<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="admin/sweetalert.css">
</head>

<body style="font-family:'Poppins',sans-serif;">
<nav class="navbar navbar-light bg-white shadow-sm fixed-top">
<div class="container">
<a class="navbar-brand fw-bold text-danger" href="{{ url('/') }}">
ChefConnect
<img src="assets/logo.png" width="35">
</a>
</div>
</nav>

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;padding-top:80px;">
<div class="card shadow p-4" style="width:100%;max-width:420px;">
<h3 class="text-center mb-2">Admin Login</h3>
<p class="text-center text-muted">Authorized Access Only</p>
<div class="login-box-msg text-center mb-2"></div>

<form id="login-form" autocomplete="off" method="POST" action="{{ route('admin.login.submit') }}">
@csrf
<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Admin Email" required>
</div>
<div class="mb-3 position-relative">
<input type="password" id="password" name="password" class="form-control pe-5" placeholder="Admin Password" required>

<span id="togglePassword" style="position:absolute; top:50%; right:15px; transform:translateY(-50%); cursor:pointer;">
👁️
</span>
</div>
<button type="submit" class="btn btn-danger w-100">Login</button>
</form>
</div>
</div>
<script>
const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

togglePassword.addEventListener("click", function () {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // Optional: change icon
    this.textContent = type === "password" ? "👁️" : "🙈";
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin/jquery.validate.min.js"></script>
<script src="admin/sweetalert.min.js"></script>
<script>
$.ajaxSetup({
headers:{
'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
}
});
$('#login-form').on('submit',function(e){
e.preventDefault();
$.ajax({
url:"{{ route('admin.login.submit') }}",
type:"POST",
data:$(this).serialize(),
success:function(res){
if(res==1){
window.location.href="{{ route('admin.dashboard') }}";
}else{
$('.login-box-msg').html("<span class='text-danger'>Invalid email or password</span>");
}
},
error:function(xhr){
$('.login-box-msg').html("<span class='text-danger'>Server error ("+xhr.status+")</span>");
}
});
});
</script>
</body>
</html>
