@extends('layouts.app')

@section('content')

<body>
    <div class="container">
        <div class="col-sm-12 my-5 text-center">
            <h2 class="fw-bold text-green">Form Animal</h2>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Gagal</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @else

        @endif
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Name</strong></p>
                        <input type="text" name="nama" id="" class="form-control" placeholder="Nama pengguna">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>No. handphone</strong></p>
                        <input type="number" name="telp" id="" class="form-control" placeholder="Jenis hewan">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>alamat</strong></p>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"
                            placeholder="alamat"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <strong>Tanggal</strong>
                        <input type="date" name="tanggal" id="" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>Total lembar</strong></p>
                        <input type="number" name="jumlah" id="" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 my-sm-2">
                    <div class="form-group">
                        <p><strong>File</strong></p>
                        <input type="file" name="file" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group col-sm-6 mt-2">
                    <label for="category_id"><strong>Jenis Layanan</strong></label>
                    <select class="form-select" name="jenis_id" id="jenis_id">
                        <option value="" selected>Pilih Jenis Layanan</option>
                        @foreach ($jenis as $data)
                        <option value="{{$data->id}}" onkeyup="sum();">{{ $data->nama_jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 my-sm-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('home')}}" class="btn btn-danger mx-2">Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection
