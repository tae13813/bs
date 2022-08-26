<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller 
{
    var $rp = 2;
    public function index() 
    {
        $category = Category::paginate($this->rp);
        return view('category/index', compact('category'));
    }

    public function search(Request $request) {
        $query = $request->q;
        if($query) {
        $category = Category::where('code', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->paginate($this->rp);
        }  
        else {
        $category = Category::paginate($this->rp);
        }
        return view('category/index', compact('category'));
        }
 }

