<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::all();
        return response([
            'status'=>True,
            'Message'=>'Data Department',
            'Data'=>$data
        ]);
    }
    public function show($id)
    {
        $data = Department::where('id_dept',$id)->get();
        return response([
            'status'=>True,
            'Message'=>'Data Department',
            'Data'=>$data
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_dept' => 'required|string|regex:/^[a-zA-Z\s]*$/u|max:255',
            ]);
        if ($validator->fails()) {
                $out = [
                "message" => $validator->messages()->all(),
                ];
                return response()->json($out, 422);
        }
        $data  = new Department();
        $data->nama_dept = $request->nama_dept;
        $create = $data->save();
        if($create){
            return response([
                'status'=>True,
                'Message'=>'Success Create Data Department',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Create Data Department',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_dept' => 'required|string|regex:/^[a-zA-Z\s]*$/u|max:255',
            ]);
        if ($validator->fails()) {
                $out = [
                "message" => $validator->messages()->all(),
                ];
                return response()->json($out, 422);
        }
        $update = Department::where('id_dept', $id)->update(['nama_dept'=>$request->nama_dept]);
        $data = Department::where('id_dept', $id)->get();
        if($update){
            return response([
                'status'=>True,
                'Message'=>'Success Update Data Department',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Update Data Department',
            ]);
        }
    }
    public function destroy($id)
    {
        $delete = Department::where('id_dept', $id)->delete();
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
