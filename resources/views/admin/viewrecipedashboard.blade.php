<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | View Recipes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('style.css') }}">
<style>
body{font-family:'Poppins',sans-serif;background:#fafafa}
.admin-sidebar{width:260px;height:100vh;position:fixed;background:linear-gradient(to bottom,#ff5e62,#ff9966);color:#fff;padding:30px 20px}
.admin-sidebar h2{text-align:center;margin-bottom:40px;font-weight:700}
.admin-sidebar a{display:flex;align-items:center;gap:12px;color:#fff;text-decoration:none;padding:12px 15px;border-radius:10px;margin-bottom:10px;transition:.3s}
.admin-sidebar a:hover,.admin-sidebar a.active{background:rgba(255,255,255,.2)}
.admin-content{margin-left:260px;padding:40px}
</style>
</head>

<body>
<div class="admin-sidebar">
<h2>ChefConnect</h2>
<a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
<a href="{{ route('admin.addrecipe') }}"><i class="fa fa-utensils"></i>Add Recipe</a>
<a href="{{ route('admin.recipes') }}" class="active"><i class="fa fa-eye"></i>View Recipes</a>
<a href="{{ route('admin.feedbacks') }}"><i class="fa fa-comments"></i>Feedbacks</a>
<form action="{{ route('admin.logout') }}" method="POST">
@csrf
<button type="submit" style="background:none;border:none;color:#fff;width:100%;text-align:left;padding:12px 15px;border-radius:10px">
<i class="fa fa-sign-out-alt"></i>Logout
</button>
</form>
</div>

<div class="admin-content">
<div class="admin-header">
<h3>All Recipes</h3>
<span class="text-muted">Manage your recipes from here</span>
</div>

<table class="table table-bordered align-middle shadow-sm">
<thead class="table-danger">
<tr>
<th>Image</th>
<th>Title</th>
<th>Category</th>
<th>Meta</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@forelse($recipes as $recipe)
<tr>
<td><img src="{{ asset('uploads/recipes/'.$recipe->image) }}" width="80"></td>
<td>{{ $recipe->title }}</td>
<td>{{ $recipe->category_name }}</td>
<td>{{ $recipe->meta }}</td>
<td>

<a href="{{ route('admin.recipe.edit',$recipe->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('admin.recipe.delete',$recipe->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this recipe?')">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5" class="text-center text-muted">No recipes found</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
