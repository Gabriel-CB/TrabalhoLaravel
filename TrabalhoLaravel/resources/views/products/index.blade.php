<?php
/**
 * @var \App\Models\Products[] $products
 */

?>

@extends('layouts.main')
@section('title', 'Products')
@section('content')
    <a href="/products/add" type="button" class="btn btn-success add-button">Add <i class="fas fa-plus"></i></a>
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
                <th scope="row">{{$product->id}}</th>
                <td scope="row">{{$product->name}}</td>
                <td scope="row">R$ {{$product->price}}</td>
                <td scope="row">{{$product->supplier_name}}</td>
                <td scope="row">
                    <a href="/products/edit/{{$product->id}}" type="button" class="btn btn-warning">
                        <i class="fas fa-pen"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('content')
