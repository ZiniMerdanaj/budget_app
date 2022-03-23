@extends('layouts.app')
 
@section('content')

    @if($errors->any())
        {{ implode('', $errors->all(':message')) }}
    @endif

    <form action="/percentage-edit" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        @foreach ($categories as $category)
        <div class="form-group">
            <label class="col-sm-3 control-label">{{ $category->name }}</label>
            <input type="number" class="col-sm-3 control-label" name="{{ $category->name }}" value="{{ $category->percentage }}">
        </div>
        @endforeach

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Edit Percentage
                </button>
            </div>
        </div>
    </form>
@endsection