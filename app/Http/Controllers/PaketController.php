<?php

namespace App\Http\Controllers;

use App\Models\paket;
use Illuminate\Http\Request;


class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = paket::all();
        return response()->json([
            "status" => "success",
            "data" => $data,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $res = paket::create($data);
        return response()->json([
            "status" => "success",
            "message" => $res
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = paket::find($id);
        if (!$data) {
            return response()->json([
                "status"=>"failed",
                "message"=> "data not found"],
                200);
        }
        $data->update($request->all());
        return response()->json([
            "status"=>"success",
            "message"=> "update success data on id ".$data->id],
            200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = paket::find($id);
        if (!$data) {
            return response()->json([
                "status"=>"failed",
                "message"=> "data not found"],
                200);
        }
        $data->delete();
        return response()->json([
            "status" => "success",
            "message" => "data successfull delete on id ".$data->id
        ], 200);
    }
}
