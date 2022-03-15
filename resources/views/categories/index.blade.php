@extends('layouts.app')
 
@section('content') 
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
 
                                <td>
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection