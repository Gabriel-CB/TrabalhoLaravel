@extends('layouts.main')
@section('title', 'Suppliers')
@section('content')
    <form
        method="POST"
        action="/suppliers/update"
        style="margin: 20px 0; display: flex; flex-direction: column; gap:10px">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required class="form-control" name="name" id="name"
                   placeholder="Name of the suppliers">
        </div>
        <div class="form-group">
            <label for="checkbox">Document Type</label>
            <div></div>
            CPF:
            <input type="radio" checked value="cpf" required name="document_type"
                   id="document_type" placeholder="checkbox">
            CNPJ:
            <input type="radio" value="cnpj" required name="document_type"
                   id="document_type" placeholder="checkbox">
        </div>
        <div class="form-group">
            <label for="document">Document</label>
            <input type="text"  required class="form-control" name="document"
                   id="document" placeholder="document">
        </div>
        <div class="form-group">
            <label for="price">Phone</label>
            <input type="text"  required class="form-control" name="phone"
                   id="phone" placeholder="description">
        </div>

        <button type="submit" style="margin-top: 10px" class="btn btn-success">Save</button>
    </form>
@endsection('content')
