@extends('layouts.app')
 
@section('content')

    <form action="/add-money" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="add" class="col-sm-3 control-label">Add</label>

            <div class="col-sm-6">
                <input type="number" name="money" id="add" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Money
                </button>
            </div>
        </div>
    </form>

    <form action="/remove-money" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="remove_money" class="col-sm-3 control-laber">Remove</label>

            <div class="col-sm-8">
                <input type="number" name="remove_money" id="remove" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Category</label>
            <select class="form-control" name="selected_category">
                <option selected>Pick Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Remove Money
                </button>
            </div>
        </div>
    </form>

    <!-- Current Categories -->
    @if (count($categories) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Categories
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Category</th>
                        <th>&nbsp;</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <a href="/percentages">Edit percentages</a>

@endsection