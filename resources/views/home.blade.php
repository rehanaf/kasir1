@extends('layout.template')

@section('main')
    <main>
        <h1>Welcome</h1>
        <a href="{{ url('produk') }}">Manajemen Produk</a>
        <a href="{{ url('transaksi')}}">Lakukan Transaksi</a>
    </main>
@endsection