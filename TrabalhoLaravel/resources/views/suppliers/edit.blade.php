<?php
/**
 * @var \App\Models\Suppliers $supplier
 */

?>

@extends('layouts.main')
@section('title', 'Listagem')
@section('content')

    <form
        method="POST"
        action="/suppliers/update"
        style="margin: 20px 0; display: flex; flex-direction: column; gap:10px">
        @csrf
        <div class="form-group">
            <input type="hidden" required name="id" id="id" value="{{$supplier->id}}">
            <label for="name">Name</label>
            <input type="text" value="{{$supplier->name}}" required class="form-control" name="name" id="name"
                   placeholder="Name of the suppliers">
        </div>
        <div class="form-group">
            <label for="checkbox">Document Type</label>
            <div></div>
            CPF:
            <input type="radio" value="{{\App\Models\Suppliers::TIPO_CPF}}" {{$supplier->document_type == \App\Models\Suppliers::TIPO_CPF ? 'checked' : ''}} required name="document_type"
                   id="document_type" placeholder="checkbox">
            CNPJ:
            <input type="radio" value="{{\App\Models\Suppliers::TIPO_CNPJ}}" {{$supplier->document_type == \App\Models\Suppliers::TIPO_CNPJ ? 'checked' : ''}} required name="document_type"
                   id="document_type" placeholder="checkbox">
        </div>
        <div class="form-group">
            <label for="document">Document</label>
            <input type="text" value="{{$supplier->document}}" class="form-control" name="document"
                   id="document" placeholder="document">
        </div>
        <div class="form-group">
            <label for="price">Phone</label>
            <input type="text" value="{{$supplier->phone}}" required class="form-control" name="phone"
                   id="phone" placeholder="phone">
        </div>

        <button type="submit" style="margin-top: 10px" class="btn btn-success">Save</button>
    </form>

@endsection('content')
