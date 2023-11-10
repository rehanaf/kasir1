@php
    use App\Models\faktur;
    $total_harga_beli = 0;
    $total_harga_jual = 0;
@endphp
@if (Session::has('session_id'))
@php
    $id_faktur = Session::get('session_id');
    $data_faktur = faktur::where('faktur',$id_faktur)->get();
@endphp
@else
    {{ Session::put('session_id',$faktur->faktur+1) }}
@endif


@extends('layout.template')

@section('main')
    <main>
        <h1>Transaksi</h1>
        @php
            $i = 1;
        @endphp
        <table>
            <tr>
                <td>No</td>
                <td>Kode</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Stok</td>
                <td>Aksi</td>
            </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga_jual }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    <form action="{{ url('faktur') }}" method="post">
                        @csrf
                        <input type="hidden" name="faktur" value="{{ $id_faktur }}">
                        <input type="hidden" name="nama" value="{{ $item->nama }}">
                        <input type="hidden" name="harga_beli" value="{{ $item->harga_beli }}">
                        <input type="hidden" name="harga_jual" value="{{ $item->harga_jual }}">
                        <input type="number" name="jumlah" id="jumlah" value="1">
                        <button type="submit">Tambahkan</button>
                    </form>
                </td>
            </tr>
            @php
                $i++
            @endphp
        @endforeach
        </table>

        <h1>Keranjang</h1>
        @if (Session::has('session_id'))
        <table>
            @foreach ($data_faktur as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->harga_jual }}</td>
                    <td>{{ $item->jumlah*$item->harga_jual }}</td>
                </tr>
                @php                    
                    $total_harga_beli += $item->harga_beli*$item->jumlah;
                    $total_harga_jual += $item->harga_jual*$item->jumlah;
                @endphp
            @endforeach
        </table>  
        <div>
            total harga {{ $total_harga_jual }}
        </div>
        @endif
        <form action="{{ url('transaksi')}}" method="post">
            @csrf
            <input type="hidden" name="kasir" placeholder="kasir" value="kasir">
            <input type="hidden" name="pendapatan" placeholder="pendapatan" value="{{ $total_harga_jual }}">
            <input type="hidden" name="keuntungan" placeholder="keuntungan" value="{{ $total_harga_jual-$total_harga_beli }}">
            <input type="number" name="bayar" placeholder="bayar">
            <input type="number" name="kembali" placeholder="kembali"> 
            <button type="submit">Selesaikan pembayaran</button>
        </form>
        <form action="{{ url('faktur/'.$id_faktur) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Reset</button>
        </form>
    </main>
@endsection