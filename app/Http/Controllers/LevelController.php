<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function index()
    {
        $data = Level::all();
        return response([
            'status'=>True,
            'Message'=>'Data Level',
            'Data'=>$data
        ]);
    }
    public function show($id)
    {
        $data = Level::where('id_level',$id)->get();
        return response([
            'status'=>True,
            'Message'=>'Data Level',
            'Data'=>$data
        ]);
    }
    public function store(Request $request)
    {
        $data  = new Level();
        $data->nama_level = $request->nama_level;
        $create = $data->save();
        if($create){
            return response([
                'status'=>True,
                'Message'=>'Success Create Data Level',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Create Data Level',
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $update = Level::where('id_level', $id)->update(['nama_Level'=>$request->nama_level]);
        $data = Level::where('id_level', $id)->get();
        if($update){
            return response([
                'status'=>True,
                'Message'=>'Success Update Data Level',
                'Data'=>$data
            ]);
        } else {
            return response([
                'status'=>False,
                'Message'=>'Failed Update Data Level',
            ]);
        }
    }
    public function destroy($id)
    {
        $delete = Level::where('id_level', $id)->delete();
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
