@extends('layouts.app')
 
@section('content')

<!-- Display errors -->
@include('common.errors')

<!-- New Category Form -->
<form action="{{ url('/category') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Category Name -->
    <div class="form-group">
        <label for="category-name" class="col-sm-3 control-label">Category</label>
        <div class="col-sm-4">
            <input type="text" name="name" id="category-name" class="form-control">
        </div>

       
    </div>
    <br>
    <div class="form-group">
    <label for="category-budget" class="col-sm-3 control-label">Spending Budget</label>
        <div class="col-sm-4">
            <input type="number" name="budget" id="category-budget" class="form-control">
        </div>
    </div>
    <!-- Add Category Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <br>
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Category
            </button>
        </div>
    </div>
</form>
@endsection