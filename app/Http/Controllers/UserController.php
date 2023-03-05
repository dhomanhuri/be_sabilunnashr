<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return response()->json(["status" => "success", "data"=> $data], 200);
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
        $data['password'] = Hash::make($data['password']);
        $res = User::create($data);
        return response()->json([
            "status" => "success",
            "message" => $res
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = User::find($id);
        if (!$data) {
            return response()->json([
                "status"=>"failed",
                "message"=> "data not found"],
                200);
        }
        $res = $data->update($request->all());
        return response()->json([
            "status"=>"success",
            "message"=>$res],
            200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        if (!$data) {
            return response()->json([
                "status"=>"failed",
                "message"=> "data not found"],
                200);
        }
        $data->delete();
        return response()->json([
            "status"=>"success",
            "message"=> "data delete success id ".$data->id],
            200);
    }
}
