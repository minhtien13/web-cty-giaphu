@extends('admin.main')

@section('container')

@include('admin.card')

<div class="main"></div>

@endsection

<style>
    .main {
        width: 100%;
        min-height: 400px;
    }
</style>

