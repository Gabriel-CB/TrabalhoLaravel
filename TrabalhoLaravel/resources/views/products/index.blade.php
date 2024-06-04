<?php
/**
 * @var \App\Models\Products[] $products
 */
?>

@extends('layouts.main')
@section('title', 'Listagem')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Supplier</th>
            <th scope="col" class="col-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product}}</th>
                <td scope="row">{{$product}}</td>
                <td scope="row">{{$product}}</td>
                <td scope="row">{{$product}}</td>
                <td scope="row">
                    <button type="button" class="btn btn-warning"><i class="fas fa-pen"></i></button>
                    {{$product}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('content')
