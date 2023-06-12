<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index () {
        $categories = Category::with(['categoryParent'])->get();
       
        return view('admin.category.category_list', compact('categories'));
    }
}
