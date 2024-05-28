<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpdateKategori;

class UpdateKategoriController extends Controller
{
    public function edit()
    {
        $update = UpdateKategori::find(1); // Pastikan ID yang sesuai
        return view('Updatekategori.edit', compact('update'));
    }

    public function update(Request $request)
    {
        $update = UpdateKategori::find(1); // Pastikan ID yang sesuai
        $update->description = $request->input('content');
        $update->save();

        return response()->json(['description' => $update->description]);
    }
}