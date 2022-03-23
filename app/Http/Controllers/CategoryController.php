<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use Redirect;

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
            'categories' => $this->categories->forUser($request->user())->where('active', true),
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

    public function add_money(Request $request)
    {
        $categories = $this->categories->forUser($request->user())->where('active', true);
        foreach($categories as $category)
        {
            $category->spending_budget += $request->money * $category->percentage / 100;
            $category->update();
        }
        return redirect('/categories');
    }

    public function remove_money(Request $request)
    {
        $categories = $this ->categories->forUser($request->user());
        $category = $categories->where('name', $request->selected_category)
                                ->where('active', true)
                                ->first();
        $category->spending_budget -= $request->remove_money;
        $category->update();
        return redirect('/categories');
    }

    public function percentage_edit(Request $request)
    {
        return view('categories.edit_percentage', [
            'categories' => $this->categories->forUser($request->user())->where('active', true),
        ]);
    }

    public function percentage_save(Request $request)
    {
        $categories = $this ->categories->forUser($request->user())->where('active', true);
        $sum = 0;
        foreach($categories as $category)
        {
            $name = $category->name;
            $category->percentage = $request->$name;
            $category->update();
            $sum += $category->percentage;
        }

        if($sum != 100) {
            return Redirect::back()->withErrors("Shuma e perqindjeve duhet 100%");
        }

        return redirect('/categories');
    }
}
