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
                <td scope="col" width="200">File</td>
                <td scope="col" width="300">Total bayar</td>
                <td scope="col" width="300">Actions</td>
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
                <td>{{number_format($order->jenis->harga * $order->jumlah)}}</td>
                <td>
                    <form action="{{ route('destroy', $order->id) }}" method="post">
                        <a href="{{ route('show', $order->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('edit', $order->id) }}" class="btn btn-primary">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
