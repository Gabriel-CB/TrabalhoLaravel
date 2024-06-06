<?php
/**
 * @var \App\Models\Suppliers[] $suppliers
 */

?>

@extends('layouts.main')
@section('title', 'Suppliers')
@section('content')
    <a href="/suppliers/add" type="button" class="btn btn-success add-button">Add <i class="fas fa-plus"></i></a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Document</th>
            <th scope="col">Phone</th>
            <th scope="col" class="col-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $supplier)
            <tr>
                <th scope="row">{{$supplier->id}}</th>
                <td scope="row">{{$supplier->name}}</td>
                <td scope="row">{{strtoupper($supplier->document_type) . ': ' . $supplier->document}}</td>
                <td scope="row">{{$supplier->phone}}</td>
                <td scope="row">
                    <a href="/suppliers/edit/{{$supplier->id}}" type="button" class="btn btn-warning">
                        <i class="fas fa-pen"></i>
                    </a>
                    <button onclick='deleteItem({{$supplier->id}})'
                            type="button" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection('content')
<script>
    function deleteItem(itemId){
        if(confirm("you really want delete this row?")){
            location.href=`/suppliers/delete/${itemId}`
        }
    }
</script>
