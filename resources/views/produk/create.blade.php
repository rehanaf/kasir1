@extends('layout.template')

@section('main')
    <form action="{{ url('produk') }}" method="post">
        @csrf
        <input type="text" name="kode" placeholder="kode">
        <input type="text" name="nama" placeholder="nama">
        <input type="number" name="harga_beli" placeholder="harga_beli">
        <input type="number" name="harga_jual" placeholder="harga_jual">
        <input type="number" name="stok" placeholder="stok">
        <button type="submit">Tambah</button>
    </form>  
@endsection
