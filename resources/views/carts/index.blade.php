@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header-text-center">Cart Menu</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Item</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @php
                                $count = 1;
                           @endphp
                           @foreach($carts as $cart)
                           <tr>
                            <td>{{$count}}</td>
                            <td>{{$cart->item}}</td>
                            <td>{{$cart->quantity}}</td>
                            <td>{{$cart->status}}</td>
                            <td>
                                    <form action="{{ route('carts.destroy', $cart->id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('carts.edit', $cart->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                            </td>
                           </tr>
                           @php
                                $count++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('carts.create') }}" class="btn btn-md btn-success mb-3">ADD CART</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection