@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-12">
        <h2 class="text-center fw-bold">Update orderan</h2>
    </div>
    <form action="{{ route('update', $order->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="col-sm-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama" id="" value="{{ $order->customer->nama }}" class="form-control">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <strong>No. handphone</strong>
                <input type="number" name="telp" id="" value="{{ $order->customer->telp }}" class="form-control">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <strong>Alamat</strong>
                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $order->customer->alamat }}</textarea>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <strong>Total lembar</strong>
                <input type="number" name="jumlah" id="" class="form-control" value="{{ $order->jumlah }}">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group col-sm-6 mt-2">
                <label for="category_id"><strong>Jenis Layanan</strong></label>
                <select class="form-select" name="jenis_id" id="jenis_id">
                    <option value="" selected>Pilih Jenis Layanan</option>
                    @foreach ($jenis as $data)
                    <option value="{{$data->id}}" onkeyup="sum();">{{ $data->nama_jenis }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-12 mt-5">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('order')}}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
