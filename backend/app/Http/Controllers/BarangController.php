<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $query = Barang::latest();
        $barang = $query->get();

        return response()->json($barang, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:258',
            'keterangan' => 'required|string|max:258',
        ];

        $messages = [
            'nama.required' => 'Nama is required',
            'keterangan.required' => 'Keterangan is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json( $validator->errors(), 400);
        }

        try {

            Barang::create([
                'nama' => $request->input('nama'),
                'keterangan' => $request->input('keterangan'),
            ]);

            return response()->json([
                'message' => "Barang successfully created."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!",
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        $barang = Barang::where('id_barang',$id)->first();

        if (!$barang) {
            return response()->json([
                'message' => "barang Not Found"
            ], 404);
        }

        return response()->json($barang, 200);
    }


    public function update(Request $request, string $id)
    {
        $rules = [
            'nama' => 'required|string|max:258',
            'keterangan' => 'required|string|max:258',
        ];

        $messages = [
            'nama.required' => 'Nama Kategori is required',
            'keterangan.required' => 'Keteragan is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json( $validator->errors(), 400);
        }

        try {
            $barang = Barang::where('id_barang', $id)->first();

            if (!$barang) {
                return response()->json([
                    'message' => "barang Not Found"
                ], 404);
            }

            $updatedData = [
                'nama' => $request->input('nama'),
                'keterangan' => $request->input('keterangan'),
            ];


            Barang::where('id_barang', $id)->update($updatedData);

            return response()->json([
                'message' => "barang successfully updated."
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong"
            ], 500);
        }
    }


    public function destroy(string $id)
    {
        $barang = Barang::where('id_barang', $id)->first();

        if (!$barang) {
            return response()->json([
                'message' => "barang Not Found"
            ], 404);
        }

        Barang::where('id_barang', $id)->delete();

        return response()->json([
            'message' => "barang successfully deleted."
        ], 200);
    }
}
