<?php

namespace App\Http\Controllers;

use App\Models\Ramadhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RamadhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Ramadhan::all();
        return response()->json([
            "status"=>"success",
            "data"=>$data,
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
            'name' => 'required',
            'wa' => 'required',
            'email' => 'required|email|unique:ramadhans',
            'domicile' => 'required',
            'job' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'upload_file' => 'required',
            'reason' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "data"=>$validator->messages()
            ]);
        }

        $ramadhan = Ramadhan::create($request->all());

        if ($ramadhan) {
            return response()->json([
                "status"=>"success",
                "message"=>"register success"
            ], 200);
        }else {
            return response()->json([
                "status"=>"failed",
                "message"=>"register failed"
            ], 200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data = Ramadhan::find($id);
        if ($data) {
            return response()->json([
                "status"=>"success",
                "data"=>$data
            ], 200);
        }else {
            return response()->json([
                "status"=>"failed",
                "message"=>"data ramadhan member not found"
            ], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ramadhan $ramadhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $ramadhan = Ramadhan::find($id);
        if (!$ramadhan) {
            return response()->json([
                "status"=>"failed",
                "message"=>"data not found"
            ], 200);
        }
        $validator = Validator::make(request()->all(),[
            'name' => 'required',
            'wa' => 'required',
            'email' => 'required|email|unique:ramadhans',
            'domicile' => 'required',
            'job' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'upload_file' => 'required',
            'reason' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "data"=>$validator->messages()
            ]);
        }
        $ramadhan->update($request->all());
        if ($ramadhan) {
            return response()->json([
                "status"=>"success",
                "message"=>"update success"
            ], 200);
        }else {
            return response()->json([
                "status"=>"failed",
                "message"=>"update failed"
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $ramadhan = Ramadhan::find($id);
        if (!$ramadhan) {  
            return response()->json([
                "status"=>"failed",
                "message"=>"id not found"
            ], 200);
        }
        $ramadhan->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"delete success"
        ], 200);
    }
}
