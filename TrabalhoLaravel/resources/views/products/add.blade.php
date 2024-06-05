@extends('layouts.main')
@section('title', 'Products')
@section('content')
    <form
        method="POST"
        action="/products/update"
        style="margin: 20px 0; display: flex; flex-direction: column; gap:10px">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required class="form-control" name="name" id="name"
                   placeholder="Name of the Product">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" required step="0.01" class="form-control" name="price"
                   id="price" placeholder="Price">
        </div>
        <div class="form-group">
            <label for="price">Description</label>
            <input type="text"  required step="0.01" class="form-control" name="description"
                   id="description" placeholder="description">
        </div>
        <div class="form-group">
            <label class="form-check-label" for="supplier-id">Supplier</label>
            <select class="form-select" required name="supplier_id" id="supplier-id"
                    aria-label="Default select example">
                <option value="">Select an option</option>
                @foreach($suppliers as $supplier)
                    <option
                        value="{{$supplier->id}}">{{$supplier->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" style="margin-top: 10px" class="btn btn-success">Save</button>
    </form>
@endsection('content')
