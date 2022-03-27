@extends('layouts.app')
 
@section('content')

<!-- Display errors -->
@include('common.errors')

<!-- New Category Form -->
<form action="/category/edit/{{ $category->id }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Category Name -->
    <div class="form-group">
        <label for="category-name" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="category-name" class="form-control" value="{{ $category->name }}">
        </div>

        <label for="category-budget" class="col-sm-3 control-label">Spending Budget</label>
        <div class="col-sm-6">
            <input type="number" name="budget" id="category-budget" class="form-control" value="{{ $category->spending_budget }}">
        </div>
    </div>

    <!-- Add Category Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Edit Category
            </button>
        </div>
    </div>
</form>
@endsection