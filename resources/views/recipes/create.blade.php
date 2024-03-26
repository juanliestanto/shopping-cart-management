@extends('layouts.app')

@section('content')
<div class="container-sm mb-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">RECIPE NAME</label>
                            <input type="text" class="form-control @error('recipe_name') is-invalid @enderror"
                                name="recipe_name" value="{{ old('recipe_name') }}" placeholder="Input recipe name">

                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label class="font-weight-bold">NOTE</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror"
                                name="note" value="{{ old('note') }}" placeholder="Input note">

                            @error('isbn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn my-4 btn-md btn-primary">SAVE</button>
                        <button type="reset" class="btn my-4 btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop