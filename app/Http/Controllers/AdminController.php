<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

public function home()
{
    $recipes = DB::table('recipes')
        ->orderBy('id', 'desc')
        ->limit(3)
        ->get();

    return view('frontend.home', compact('recipes'));
}

public function about(){ return view('frontend.about'); }
public function contact(){ return view('frontend.contact'); }

public function recipes(Request $request)
{
    // Fetch categories
    $categories = DB::table('categories')->get();

    // JOIN with categories
    $query = DB::table('recipes')
        ->join('categories', 'recipes.category_id', '=', 'categories.id')
        ->select('recipes.*', 'categories.category as category_name')
        ->orderBy('recipes.id', 'desc');

    // Filter using category_id
    if ($request->category) {
    $query->where('recipes.category_id', $request->category);
}

    $recipes = $query->get();

    return view('frontend.recipes', compact('recipes', 'categories'));
}

public function viewRecipe($id){
    $recipe = Recipe::findOrFail($id);
    $ingredients = DB::table('ingredients')->where('recipe_id',$id)->get();
    $steps = DB::table('steps')->where('recipe_id',$id)->get();
    return view('frontend.viewrecipe',compact('recipe','ingredients','steps'));
}

public function adminlogin(){ return view('admin.adminlogin'); }

public function admin_login(Request $request){
    $user = User::where('email',$request->email)->where('usertype','admin')->first();
    if(!$user || $request->password !== $user->password){
        return response()->json(['msg'=>'Invalid email or password'],200);
    }
    Auth::login($user);
    return response()->json(1);
}

public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
}

public function dashboard(){
    $recipeCount = DB::table('recipes')->count();
    $userCount = DB::table('users')->count();
    $feedbackCount = DB::table('feedbacks')->count();
    return view('admin.dashboard',compact('recipeCount','userCount','feedbackCount'));
}

public function addrecipedashboard(){
    $categories = DB::table('categories')->get(); // IMPORTANT
    return view('admin.addrecipedashboard', compact('categories'));
}

public function viewrecipedashboard(){
    $recipes = DB::table('recipes')
        ->join('categories', 'recipes.category_id', '=', 'categories.id')
        ->select('recipes.*', 'categories.category as category_name')
        ->orderBy('recipes.id','desc')
        ->get();

    return view('admin.viewrecipedashboard',compact('recipes'));
}

public function storeRecipe(Request $request){
    $request->validate([
        'title'=>'required',
        'category_id'=>'required',
        'description'=>'required',
        'image'=>'required|image',
        'ingredients'=>'required|array',
        'steps'=>'required|array'
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('uploads/recipes'),$imageName);

    $recipeId = DB::table('recipes')->insertGetId([
        'title'=>$request->title,
        'tagline'=>$request->tagline,
        'category_id'=>$request->category_id, // ✅ FIXED
        'description'=>$request->description,
        'meta'=>$request->meta,
        'image'=>$imageName
    ]);

    foreach($request->ingredients as $ingredient){
        DB::table('ingredients')->insert([
            'recipe_id'=>$recipeId,
            'ingredient'=>$ingredient
        ]);
    }

    foreach($request->steps as $step){
        DB::table('steps')->insert([
            'recipe_id'=>$recipeId,
            'step'=>$step
        ]);
    }

    return redirect()->route('admin.recipes')->with('success','Recipe added successfully');
}

public function editRecipe($id){
    $recipe = Recipe::findOrFail($id);
    $categories = DB::table('categories')->get(); // IMPORTANT
    $ingredients = DB::table('ingredients')->where('recipe_id',$id)->pluck('ingredient');
    $steps = DB::table('steps')->where('recipe_id',$id)->pluck('step');

    return view('admin.editrecipe',compact('recipe','ingredients','steps','categories'));
}

public function updateRecipe(Request $request, $id)
{
    $recipe = Recipe::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'category_id' => 'required',
        'description' => 'required',
        'image' => 'nullable|image',
        'ingredients' => 'required|array',
        'steps' => 'required|array'
    ]);

    // ✅ DEBUG (optional)
    // dd($request->category_id);

    // ✅ HANDLE IMAGE
    if ($request->hasFile('image')) {
        $oldImage = public_path('uploads/recipes/' . $recipe->image);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/recipes'), $imageName);

        $recipe->image = $imageName;
    }

    // ✅ IMPORTANT: Assign values manually (avoid update() issue)
    $recipe->title = $request->title;
    $recipe->tagline = $request->tagline;
    $recipe->category_id = $request->category_id; // 🔥 MAIN FIX
    $recipe->description = $request->description;
    $recipe->meta = $request->meta;

    $recipe->save(); // ✅ SAVE manually

    // ✅ INGREDIENTS RESET
    DB::table('ingredients')->where('recipe_id', $id)->delete();

    foreach ($request->ingredients as $ingredient) {
        DB::table('ingredients')->insert([
            'recipe_id' => $id,
            'ingredient' => $ingredient
        ]);
    }

    // ✅ STEPS RESET
    DB::table('steps')->where('recipe_id', $id)->delete();

    foreach ($request->steps as $step) {
        DB::table('steps')->insert([
            'recipe_id' => $id,
            'step' => $step
        ]);
    }

    return redirect()->route('admin.recipes')->with('success', 'Recipe updated successfully');
}

public function deleteRecipe($id){
    DB::table('ingredients')->where('recipe_id',$id)->delete();
    DB::table('steps')->where('recipe_id',$id)->delete();

    $recipe = Recipe::findOrFail($id);
    $imagePath = public_path('uploads/recipes/'.$recipe->image);

    if(file_exists($imagePath)) unlink($imagePath);

    $recipe->delete();

    return redirect()->back()->with('success','Recipe deleted successfully');
}

public function storeFeedback(Request $request){
    DB::table('feedbacks')->insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'message'=>$request->message
    ]);

    return back()->with('success','Feedback sent successfully!');
}

public function viewFeedbacks(){
    $feedbacks = DB::table('feedbacks')->orderBy('id','desc')->get();
    return view('admin.feedbacks',compact('feedbacks'));
}

}