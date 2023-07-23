<?php

namespace App\Http\Controllers;

use App\Models\event2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Event2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = event2::all();
        return response()->json([
            "status"=>"success",
            "data"=>$data
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
        $validator = Validator::make(request()->all(),[
            'paket' => 'required',
            'name' => 'required',
            'wa' => 'required',
            'email' => 'required|email|unique:event2s',
            'domicile' => 'required',
            'job' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'upload_file' => 'required|mimes:jpeg,png,jpg,gif',
            'reason' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "data"=>$validator->messages()->first()
            ]);
        }
        $data = $request->all();
        $data['upload_file'] = $request->file('upload_file')->store('img');
        
        $ramadhan = event2::create($data);

        if ($ramadhan) {
            return response()->json([
                "status"=>"success",
                "message"=>"register success"
            ], 200);
        }else {
            return response()->json([
                "status"=>"failed",
                "message"=>"register failed"
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data = Event2::find($id);
        if ($data) {
            return response()->json([
                "status"=>"success",
                "data"=>$data
            ], 200);
        }else {
            return response()->json([
                "status"=>"failed",
                "message"=>"data event member not found"
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event2 $event2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $event2 = Event2::find($id);
        if (!$event2) {
            return response()->json([
                "status"=>"failed",
                "message"=>"data not found"
            ], 400);
        }
        $event2->update($request->all());
        if ($event2) {
            return response()->json([
                "status"=>"success",
                "message"=>"update success",
                "data"=>$event2
            ], 200);
        }else {
            return response()->json([
                "status"=>"failed",
                "message"=>"update failed"
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $event2 = Event2::find($id);
        if (!$event2) {  
            return response()->json([
                "status"=>"failed",
                "message"=>"id not found"
            ], 400);
        }
        $event2->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"delete success"
        ], 200);
    }
}
