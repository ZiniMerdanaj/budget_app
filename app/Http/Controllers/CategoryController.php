<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    protected $categories;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->middleware('auth');

        $this->categories = $categories;
    }

    public function index(Request $request)
    {
        return view('categories.index', [
            'categories' => $this->categories->forUser($request->user()),
        ]);
    }

    public function category_form(Request $request)
    {
        return view('categories.category_form');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->categories()->create([
            'name' => $request->name,
        ]);
    
        return redirect('/categories');
        }
}
