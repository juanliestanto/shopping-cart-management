@extends('layouts.app')

@section('content')
<div class="container-sm mb-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">RECIPE</label>
                            <select class="custom-select" aria-label="Default select example" name="recipe_id">
                                <option selected>Open this select menu</option>
                                @foreach ($recipes as $recipe)
                                    <option value="{{ $recipe->id }}">
                                        {{ $recipe->recipe_name }}</option>
                                @endforeach
                            </select>

                            @error('recipe')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">ITEM NAME</label>
                            <input type="text" class="form-control @error('recipe_name') is-invalid @enderror"
                                name="item" value="{{ old('item') }}" placeholder="Input item">

                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label class="font-weight-bold">QUANTITY</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror"
                                name="quantity" value="{{ old('quantity') }}" placeholder="Input quantity">

                            @error('isbn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group my-4">
                            <label class="font-weight-bold">STATUS</label>
                            <input type="text" class="form-control @error('note') is-invalid @enderror"
                                name="status" value="{{ old('status') }}" placeholder="Input status">

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