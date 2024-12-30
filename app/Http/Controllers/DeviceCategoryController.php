<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeviceCategory;

class DeviceCategoryController extends Controller
{
    public function index()
    {
        return DeviceCategory::all();
    }

    public function store(Request $request)
    {
        $category = new DeviceCategory;
        $category->category = $request->category;
        $category->save();

        return response()->json([
            "message" => "Device category telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return DeviceCategory::find($id);
    }

    public function update(Request $request, string $id)
    {
        if (DeviceCategory::where('id', $id)->exists()) {
            $category = DeviceCategory::find($id);
            $category->category = is_null($request->category) ? $category->category : $request->category;
            $category->save();

            return response()->json([
                "message" => "Device category telah diupdate."
            ], 201);
        } else {
            return response()->json([
                "message" => "Device category tidak ditemukan."
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        if (DeviceCategory::where('id', $id)->exists()) {
            $category = DeviceCategory::find($id);
            $category->delete();

            return response()->json([
                "message" => "Device category telah dihapus."
            ], 201);
        } else {
            return response()->json([
                "message" => "Device category tidak ditemukan."
            ], 404);
        }
    }
}
