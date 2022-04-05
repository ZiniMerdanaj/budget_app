@extends('layouts.app')
 
@section('content')

    @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif

    <form action="/add-money" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="add" class="col-sm-3 control-label">Add</label>

            <div class="col-sm-2">
                <input type="number" name="money" id="add" class="form-control">
            </div>
        </div>
<br>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add Money
                </button>
            </div>
        </div>
        <br>
        <br>
    </form>

    <form action="/remove-money" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="remove_money" class="col-sm-3 control-laber">Remove</label>

            <div class="col-sm-4">
                <input type="number" name="remove_money" id="remove" class="form-control">
            </div>
        </div>
       <br>
        <div class="form-group">
            <label class="col-sm-3 control-label">Category</label>
            <div class="col-sm-4">
            <select class="form-control" name="selected_category">
                <option selected>Pick Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
<br>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-plus"></i> Remove Money
                </button>
            </div>
        </div>
        <br>
    </form>

    <!-- Current Categories -->
    @if (count($categories) > 0)
        <div class="panel panel-default">
            <br>
            <div class="panel-heading">
              <h1> Current Categories</h1> 
            </div>
 
            <div class="panel-body">
                <table class="table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Quantity</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <!-- Category Name -->
                                <td class="table-text">
                                    <div>{{ $category->name }}</div>
                                </td>

                                <td class="table-text">
                                    <div>{{ $category->spending_budget }}</div>
                                </td>

                                <td>
                                    <form action="/category/{{ $category->id }}" method="POST">
                                        {{ csrf_field() }}
                            
                                        <button  type="button" class="btn btn-danger" >Delete</button>
                                    </form>
                                </td>

                                <td>
                                    
                                    <a class="btn btn-primary" href="/category/edit/{{ $category->id }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <a class="btn btn-primary" href="/percentages">Edit percentages</a>

@endsection