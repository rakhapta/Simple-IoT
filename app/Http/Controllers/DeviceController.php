<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;

class DeviceController extends Controller
{

    public function index()
    {
        return Device::all();
    }

    public function store(Request $request)
    {   
        $device = new Device;
        $device->category_id = $request->category_id;
        $device->name = $request->name;
        $device->user_id = $request->user_id;
        $device->last_value = $request->last_value;
        $device->save();
        return response()->json([
        "message" => "Device telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return Device::find($id);
    }


    public function update(Request $request, string $id)
    {
        if (Device::where('id', $id)->exists()) {
            $device = Device::find($id);
        
            $device->category_id = is_null($request->category_id) ? $device->category_id : $request->category_id;
            $device->name = is_null($request->name) ? $device->name : $request->name;
            $device->user_id = is_null($request->user_id) ? $device->user_id : $request->user_id;
            $device->last_value = is_null($request->last_value) ? $device->last_value : $request->last_value;
        
            $device->save();
        
            return response()->json([
                "message" => "Device telah diupdate."
            ], 201);
        } else {
            return response()->json([
                "message" => "Device tidak ditemukan."
            ], 404);
        }
        
    }

    public function destroy(string $id)
    {
        if (Device::where('id', $id)->exists()) {
            $device = Device::find($id);
            $device->delete();
            return response()->json([
            "message" => "Device telah dihapus."
            ], 201);
            } else {
            return response()->json([
            "message" => "Device tidak ditemukan."
            ], 404);
            }
    }
}
