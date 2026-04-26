<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | Edit Recipe</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

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

<!-- SIDEBAR -->
<div class="admin-sidebar">
<h2>ChefConnect</h2>

<a href="{{ route('admin.dashboard') }}">
<i class="fa fa-home"></i>Dashboard
</a>

<a href="{{ route('admin.addrecipe') }}">
<i class="fa fa-utensils"></i>Add Recipe
</a>

<a href="{{ route('admin.recipes') }}" class="active">
<i class="fa fa-eye"></i>View Recipes
</a>

<form action="{{ route('admin.logout') }}" method="POST">
@csrf
<button type="submit" style="background:none;border:none;color:#fff;width:100%;text-align:left;padding:12px 15px;border-radius:10px">
<i class="fa fa-sign-out-alt"></i>Logout
</button>
</form>
</div>

<!-- CONTENT -->
<div class="admin-content">

<div class="d-flex justify-content-between align-items-center mb-4">
<h3 class="fw-bold text-danger">Edit Recipe</h3>
<a href="{{ route('admin.recipes') }}" class="btn btn-outline-danger btn-sm">Back</a>
</div>

<form action="{{ route('admin.recipe.update',$recipe->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<!-- RECIPE DETAILS -->
<div class="card p-4 mb-4 shadow-sm">
<h5 class="fw-bold mb-3">Recipe Details</h5>

<div class="mb-3">
<label class="form-label">Title</label>
<input type="text" name="title" class="form-control" value="{{ $recipe->title }}" required>
</div>

<div class="mb-3">
<label class="form-label">Tagline</label>
<input type="text" name="tagline" class="form-control" 
value="{{ $recipe->tagline }}" 
placeholder="Short catchy line for your recipe">
</div>


<div class="mb-3">
<label class="form-label">Category</label>

<select name="category_id" class="form-select" required>
    <option value="">-- Select Category --</option>

    @foreach($categories as $cat)
    <option value="{{ $cat->id }}"
        {{ $recipe->category_id == $cat->id ? 'selected' : '' }}>
        {{ $cat->category }}
    </option>
    @endforeach

</select>


</div>

<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control" rows="3" required>{{ $recipe->description }}</textarea>
</div>

<div class="mb-3">
<label class="form-label">Meta</label>
<input type="text" name="meta" class="form-control" value="{{ $recipe->meta }}">
</div>

<div class="mb-3">
<label class="form-label">Change Image</label>
<input type="file" name="image" class="form-control">
<small class="text-muted">Uploading a new image will replace the existing one</small>
</div>

</div>

<!-- INGREDIENTS -->
<div class="card p-4 mb-4 shadow-sm">
<h5 class="fw-bold mb-3">Ingredients</h5>

@foreach($ingredients as $ingredient)
<input type="text" name="ingredients[]" class="form-control mb-2" value="{{ $ingredient }}" required>
@endforeach

</div>

<!-- STEPS -->
<div class="card p-4 mb-4 shadow-sm">
<h5 class="fw-bold mb-3">Preparation Steps</h5>

@foreach($steps as $step)
<input type="text" name="steps[]" class="form-control mb-2" value="{{ $step }}" required>
@endforeach

</div>

<!-- SUBMIT -->
<div class="text-end">
<button class="btn btn-danger px-4">Update Recipe</button>
</div>

</form>

</div>

</body>
</html>