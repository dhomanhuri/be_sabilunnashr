<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = member::all();
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
        $data['upload_file'] = $request->file('upload_file')->store('img');
        $res = member::create($data);
        return response()->json([
            "status" => "success",
            "message" => $res
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $dataUpdate = $request->all();
        $data = member::find($id);
        try {
            $dataUpdate['upload_file'] = $request->file('upload_file')->store('img');
        } catch (\Throwable $th) {
            //throw $th;
            $dataUpdate['upload_file'] = $data->upload_file;
        }
        if (!$data) {
            return response()->json([
                "status"=>"failed",
                "message"=> "data not found"],
                200);
        }
        $data->update($dataUpdate);
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
        $data = member::find($id);
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
