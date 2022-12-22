@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h2 class="text-center fw-bold py-5">Data Orderan</h2>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <td scope="col">No</td>
                <td scope="col"width="150">Tanggal Masuk</td>
                <td scope="col" width="400">Alamat</td>
                <td scope="col" width="150">Jenis Print</td>
                <td scope="col" width="150">Status pesanan</td>
                <td scope="col" width="200">Total bayar</td>
                <td scope="col" width="300">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>{{$order->tanggal}}</td>
                <td>{{$order->customer->alamat}}</td>
                <td>{{$order->jenis->nama_jenis}}</td>
                <td>{{$order->status->nama_status}}</td>
                <td><a href="{{ url('download/' .$order->id) }}"><button class="btn btn-primary" type="button">Download</button></a></td>
                <td>{{$order->jenis->harga * $order->jumlah}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
