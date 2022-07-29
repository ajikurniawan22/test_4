<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::all();
        return response([
            'status'=>True,
            'Message'=>'Data Jabatan',
            'Data'=>$data
        ]);
    }
    public function show($id)
    {
        $data = Jabatan::where('id_jabatan',$id)->get();
        return response([
            'status'=>True,
            'Message'=>'Data Jabatan',
            'Data'=>$data
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|regex:/^[a-zA-Z\s]*$/u|max:255',
            ]);
        if ($validator->fails()) {
                $out = [
                "message" => $validator->messages()->all(),
                ];
                return response()->json($out, 422);
        }
        $data  = new Jabatan();
        $data->nama_jabatan = $request->nama_jabatan;
        $data->id_level = $request->id_level;
        $create = $data->save();
        if($create){
            return response([
                'status'=>True,
                'Message'=>'Success Create Data Jabatan',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Create Data Jabatan',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $update = Jabatan::where('id_jabatan', $id)->update(['nama_jabatan'=>$request->nama_jabatan,'id_level'=>$request->id_level]);
        $data = Jabatan::where('id_jabatan', $id)->get();
        if($update){
            return response([
                'status'=>True,
                'Message'=>'Success Update Data Jabatan',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Update Data Jabatan',
            ]);
        }
    }
    public function destroy($id)
    {
        $delete = Jabatan::where('id_jabatan', $id)->delete();
        if($delete){
            return response([
                'status'=>True,
                'Message'=>'Data Deleted',
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Fail Delete Data',
            ]);
        }
    }
}
