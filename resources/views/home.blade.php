@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-text-center">Recipe Menu</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu Name</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Note</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                                $count = 1;
                           @endphp
                           @foreach($recipes as $recipe)
                           <tr>
                            <td>{{$count}}</td>
                            <td>{{$recipe->recipe_name}}</td>
                            <td>{{$recipe->created_at}}</td>
                            <td>{{$recipe->note}}</td>
                            <td><a href="{{ route('carts.show', $recipe->id) }}">Details</a></td>
                           </tr>
                           @php
                                $count++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('recipes.create') }}" class="btn btn-md btn-success mb-3">ADD RECIPE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection