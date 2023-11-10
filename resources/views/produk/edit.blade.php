@extends('layout.template')

@section('main')
    <form action="{{ url('produk/'.$data->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="kode" placeholder="kode" value="{{ $data->kode }}">
        <input type="text" name="nama" placeholder="nama" value="{{ $data->nama }}">
        <input type="number" name="harga_beli" placeholder="harga_beli" value="{{ $data->harga_beli }}">
        <input type="number" name="harga_jual" placeholder="harga_jual" value="{{ $data->harga_jual }}">
        <input type="number" name="stok" placeholder="stok" value="{{ $data->stok }}">
        <button type="submit">Edit</button>
    </form>  
@endsection
