<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Order;
use App\Models\Status;
use App\Models\Customer;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::with('orders')->get();
        $status = Status::with('orders')->get();
        $customer = Customer::with('orders')->get();
        $orders = Order::with('jenis', 'status', 'customer')->get();

        return view('order', compact('jenis','status', 'customer', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function download($id) {
        $file_uploads = DB::table('orders')->where('id', $id)->first();
        $path=public_path("file/{$file_uploads->file}");
        return response()->download($path);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:doc,docx,pdf,xls,xlsx,pdf,ppt,pptx',
        ]);
        $dokumen = $request->file('file');
        $nama_dokumen = 'FT'.date('Ymdhis'). '.' .$request->file('file')->
        getClientOriginalExtension();
        $dokumen->move('file/', $nama_dokumen);

        $data = $request->all();

        $customer = new Customer;
        
        $customer->nama = $data['nama'];
        $customer->telp = $data['telp'];
        $customer->alamat = $data['alamat'];
        $customer->save();

        $order = new Order;
        $order->file = $nama_dokumen;
        // $order->file = $data['file'];
        // if ($file = $request->file('file')) {
        //     $destinationPath = 'assets/file/';
        //     $filePrint = date('YmdHis') . "." .$file->getClientOriginalExtension();
        //     $file->move($destinationPath, $filePrint);
        //     $data['file'] = "$filePrint";
        // }

        $order->jenis_id = $data['jenis_id'];
        $order->jumlah = $data['jumlah'];
        $order->tanggal = $data['tanggal'];
        $order->customer_id = $customer->id;
        $order->user_id = auth()->id();
        $order->save();

        return redirect()->route('order')->with('success', 'berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $jenis = Jenis::all();
        $status = Status::all();
        $customer = Customer::all();

        return view('edit', compact('order','jenis', 'status', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $input = $request->all();
        $order->update($input);

        return redirect()->route('order')->with('success', 'Orderan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order')->with('success', 'orderan berhasil dihapus');
    }
}
