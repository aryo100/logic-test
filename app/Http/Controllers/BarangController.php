<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Barang::get();
        
        $response = [
            "success" => true,
            "data" => $result,
            "message" => "success",
        ];
 
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barang' => 'required|max:10',
            'harga_barang' => 'required|max:11',
        ]);

        
        // return response()->json($request->nama_barang, 200);
        $result = Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        
        $response = [
            "success" => true,
            "data" => $result,
            "message" => "Create successfully.",
        ];
 
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Barang::find($id);
        
        $response = [
            "success" => true,
            "data" => $result,
            "message" => "success",
        ];
 
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $barang = Barang::find($id);

        $this->validate($request, [
            'nama_barang' => 'required|max:10',
            'harga_barang' => 'required|max:11',
        ]);

        $barang->nama_barang = $input['nama_barang'];
        $barang->harga_barang = $input['harga_barang'];
        $barang->save();
        
        $response = [
            "success" => true,
            "data" => $barang,
            "message" => "Update successfully.",
        ];
 
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang  = Barang::find($id);
        $result = $barang->delete();
        $response = [
            "success" => true,
            "data" => $result,
            "message" => "deleted successfully",
        ];
 
        return response()->json($response, 200);
    }
}
