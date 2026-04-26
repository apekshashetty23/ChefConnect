<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ChefConnect | Add Recipe</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
<a href="{{ route('admin.addrecipe') }}" class="active"><i class="fa fa-utensils"></i>Add Recipe</a>
<a href="{{ route('admin.recipes') }}"><i class="fa fa-eye"></i>View Recipes</a>
<a href="{{ route('admin.feedbacks') }}"><i class="fa fa-comments"></i>Feedbacks</a>
<form action="{{ route('admin.logout') }}" method="POST">
@csrf
<button type="submit" style="background:none;border:none;color:#fff;width:100%;text-align:left;padding:12px 15px;border-radius:10px">
<i class="fa fa-sign-out-alt"></i>Logout
</button>
</form>
</div>
<div class="admin-content">
<h3 class="fw-bold text-danger mb-4">Add New Recipe</h3>
<form action="{{ route('admin.storeRecipe') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card p-4 mb-4 shadow-sm">
<h5 class="fw-bold mb-3">Recipe Details</h5>
<div class="mb-3">
<label class="form-label">Recipe Title</label>
<input type="text" name="title" class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Tagline</label>
<input type="text" name="tagline" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Category</label>
<select name="category_id" class="form-select" required>
    <option value="" disabled selected>-- Select Category --</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}">{{ $cat->category }}</option>
@endforeach
</select>
</div>
<div class="mb-3">
<label class="form-label">Description</label>
<textarea name="description" class="form-control" rows="3" required></textarea>
</div>
<div class="mb-3">
<label class="form-label">Meta Info</label>
<input type="text" name="meta" class="form-control" placeholder="30 mins | Serves 2 | Medium">
</div>
<div class="mb-3">
<label class="form-label">Recipe Image</label>
<input type="file" name="image" class="form-control" required>
</div>
</div>
<div class="card p-4 mb-4 shadow-sm">
<h5 class="fw-bold mb-3">Ingredients</h5>
<div id="ingredientsWrapper">
<input type="text" name="ingredients[]" class="form-control mb-2" required>
</div>
<button type="button" class="btn btn-outline-danger btn-sm" onclick="addIngredient()">Add Ingredient</button>
</div>
<div class="card p-4 mb-4 shadow-sm">
<h5 class="fw-bold mb-3">Preparation Steps</h5>
<div id="stepsWrapper">
<textarea name="steps[]" class="form-control mb-2" required></textarea>
</div>
<button type="button" class="btn btn-outline-danger btn-sm" onclick="addStep()">Add Step</button>
</div>
<div class="text-end">
<button class="btn btn-danger px-4">Save Recipe</button>
</div>
</form>
</div>
<script>
function addIngredient(){document.getElementById("ingredientsWrapper").insertAdjacentHTML("beforeend","<input type='text' name='ingredients[]' class='form-control mb-2' required>")}
function addStep(){document.getElementById("stepsWrapper").insertAdjacentHTML("beforeend","<textarea name='steps[]' class='form-control mb-2' required></textarea>")}
</script>
</body>
</html>
