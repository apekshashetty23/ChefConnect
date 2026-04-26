<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
body{font-family:'Poppins',sans-serif;background:#fafafa}
.admin-sidebar{width:260px;height:100vh;position:fixed;background:linear-gradient(to bottom,#ff5e62,#ff9966);color:#fff;padding:30px 20px}
.admin-sidebar h2{text-align:center;margin-bottom:40px;font-weight:700}
.admin-sidebar a,.admin-sidebar button{display:flex;align-items:center;gap:12px;color:#fff;text-decoration:none;padding:12px 15px;border-radius:10px;margin-bottom:10px;transition:.3s;width:100%;background:none;border:none;cursor:pointer;text-align:left}
.admin-sidebar a:hover,.admin-sidebar a.active,.admin-sidebar button:hover{background:rgba(255,255,255,.2)}
.admin-content{margin-left:260px;padding:40px}
.admin-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px}
.admin-header h3{font-weight:600;color:#ff5c5c}
.stat-card{text-align:center;padding:25px;border-radius:15px;color:#fff;box-shadow:0 5px 15px rgba(0,0,0,.1)}
.stat-card h5{font-size:2.2rem;margin-bottom:5px}
.bg-primary{background:#007bff}
.bg-success{background:#28a745}
.bg-warning{background:#ffc107;color:#000}
.bg-danger{background:#dc3545}
</style>
</head>
<body>

<div class="admin-sidebar">
<h2>ChefConnect</h2>
<a href="{{ route('admin.dashboard') }}" class="active"><i class="fa fa-home"></i>Dashboard</a>
<a href="{{ route('admin.addrecipe') }}"><i class="fa fa-utensils"></i>Add Recipe</a>
<a href="{{ route('admin.recipes') }}"><i class="fa fa-eye"></i>View Recipes</a>
<a href="{{ route('admin.feedbacks') }}"><i class="fa fa-comment"></i>Feedbacks</a>
<form action="{{ route('admin.logout') }}" method="POST">
@csrf
<button type="submit"><i class="fa fa-sign-out-alt"></i>Logout</button>
</form>
</div>

<div class="admin-content">
<div class="admin-header">
<h3>Dashboard</h3>
<span class="text-muted">Welcome to your admin panel</span>
</div>

<div class="row g-4 mb-4">
<div class="col-md-3">
<div class="stat-card bg-primary">
<h5>{{ $recipeCount ?? 0 }}</h5>
<p>Total Recipes</p>
</div>
</div>
<div class="col-md-3">
<div class="stat-card bg-success">
<h5>{{ $userCount ?? 0 }}</h5>
<p>Total Users</p>
</div>
</div>
<div class="col-md-3">
<div class="stat-card bg-danger">
<h5>{{ $feedbackCount ?? 0 }}</h5>
<p>Feedbacks</p>
</div>
</div>
</div>

<div class="card shadow-sm border-0 rounded-4 p-4">
<h4 class="text-danger fw-bold mb-3">Quick Actions</h4>
<a href="{{ route('admin.addrecipe') }}" class="btn btn-danger me-2"><i class="fa fa-plus"></i>Add New Recipe</a>
<a href="{{ route('admin.recipes') }}" class="btn btn-secondary"><i class="fa fa-eye"></i>View Recipes</a>
</div>
</div>

</body>
</html>
