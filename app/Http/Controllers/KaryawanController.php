<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::all();
        return response([
            'status'=>True,
            'Message'=>'Data Karyawan',
            'Data'=>$data
        ]);
    }
    public function show($id)
    {
        $data = Karyawan::where('id_karyawan',$id)->get();
        return response([
            'status'=>True,
            'Message'=>'Data Karyawan',
            'Data'=>$data
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik'=>'required|string|unique:karyawan',
            'nama' => 'required|string|regex:/^[a-zA-Z\s]*$/u|max:255',
            'ttl'=>'required',
            'alamat'=>'required',
            'id_jabatan'=>'required',
            'id_dept'=>'required'
            ]);
        if ($validator->fails()) {
                $out = [
                "message" => $validator->messages()->all(),
                ];
                return response()->json($out, 422);
        }
        $data  = new Karyawan();
        $data->nik = $request->nik;
        $data->nama = $request->nama;
        $data->ttl  = $request->ttl;
        $data->alamat = $request->alamat;
        $data->id_jabatan = $request->id_jabatan;
        $data->id_dept = $request->id_dept;
        $create = $data->save();
        if($create){
            return response([
                'status'=>True,
                'Message'=>'Success Create Data Karyawan',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Create Data Karyawan',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|regex:/^[a-zA-Z\s]*$/u|max:255',
            'ttl'=>'required',
            'alamat'=>'required',
            'id_jabatan'=>'required',
            'id_dept'=>'required'
            ]);
        if ($validator->fails()) {
                $out = [
                "message" => $validator->messages()->all(),
                ];
                return response()->json($out, 422);
        }
        $update = Karyawan::where('id_karyawan', $id)->update(['nama'=>$request->nama,'nik'=>$request->nik,'ttl'=>$request->ttl,'alamat'=>$request->alamat,'id_jabatan'=>$request->id_jabatan,'id_dept'=>$request->id_dept]);
        $data = Karyawan::where('id_karyawan', $id)->get();
        if($update){
            return response([
                'status'=>True,
                'Message'=>'Success Update Data Karyawan',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Update Data Karyawan',
            ]);
        }
    }
    public function destroy($id)
    {
        $delete = Karyawan::where('id_karyawan', $id)->delete();
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
