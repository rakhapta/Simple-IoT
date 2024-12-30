<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLog;

class DataLogController extends Controller
{
    public function index()
    {
        return DataLog::all();
    }

    public function store(Request $request)
    {
        $log = new DataLog;
        $log->device_id = $request->device_id;
        $log->value = $request->value;
        $log->time_log = $request->time_log;
        $log->save();

        return response()->json([
            "message" => "Data log telah ditambahkan."
        ], 201);
    }

    public function show(string $id)
    {
        return DataLog::find($id);
    }

    public function update(Request $request, string $id)
    {
        if (DataLog::where('id', $id)->exists()) {
            $log = DataLog::find($id);
            $log->device_id = is_null($request->device_id) ? $log->device_id : $request->device_id;
            $log->value = is_null($request->value) ? $log->value : $request->value;
            $log->time_log = is_null($request->time_log) ? $log->time_log : $request->time_log;
            $log->save();

            return response()->json([
                "message" => "Data log telah diupdate."
            ], 201);
        } else {
            return response()->json([
                "message" => "Data log tidak ditemukan."
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        if (DataLog::where('id', $id)->exists()) {
            $log = DataLog::find($id);
            $log->delete();

            return response()->json([
                "message" => "Data log telah dihapus."
            ], 201);
        } else {
            return response()->json([
                "message" => "Data log tidak ditemukan."
            ], 404);
        }
    }
}
