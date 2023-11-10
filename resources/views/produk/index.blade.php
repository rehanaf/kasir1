@extends('layout.template')

@section('main')
    <main>
        <h1>Produk</h1>
        <a href="{{ url('produk/create') }}">Tambah</a>
        @php
            $i = 1;
        @endphp
        <table>
            <tr>
                <td>No</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Stok</td>
                <td>Tanggal</td>
                <td>Aksi</td>
            </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga_beli }}</td>
                <td>{{ $item->harga_jual }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <a href="{{ url('produk/'.$item->id.'/edit') }}">Edit</a>
                    <form action="{{ url('produk/'.$item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
        </table>
    </main>
@endsection