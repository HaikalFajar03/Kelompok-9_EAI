<?php

namespace App\Http\Controllers;

use App\Models\database;
use App\Models\form; //Nabilla
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DatabaseController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $ini = Database::where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nik', 'LIKE', '%' . $keyword . '%')
            ->orWhere('domisili', 'LIKE', '%' . $keyword . '%')
            ->orWhere('notelp', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        return view('databasependuduk', ['ini' => $ini, 'keyword' => $keyword]);
    }

    public function create()
    {
        return view('tambahdatabase');

    }

    public function store(Request $request)
    {
        Log::info('Store Request Data: ' . json_encode($request->all()));

        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|integer',
            'domisili' => 'required|string',
            'notelp' => 'nullable|string',
        ]);

        Log::info('Validated Data: ' . json_encode($request->all()));

        // Simpan data ke dalam database
        Database::create([
                    'nama' => $request->input('nama'),
                    'nik' => $request->input('nik'),
                    'domisili' => $request->input('domisili'),
                    'notelp' => $request->input('notelp'),
        ]);

        Log::info('Data Created');

        return redirect()->route('databasependuduk')
            ->with('success', 'Data baru berhasil ditambahkan');
    }

    public function edit($id)
    {
    $ini = Database::findorFail($id);
    return view ('editdatabase', compact('ini'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Update Request Data: ' . json_encode($request->all()));


        $request->validate([
            'nama' => 'required|unique:database,nama' .$id ,
            'nik' => 'required|integer',
            'domisili' => 'required|string',
            'notelp' => 'nullable|string',
        ]);

        Log::info('Validated Data: ' . json_encode($request->all()));

        $ini = Database::findOrFail($id);

        $ini->update([
            'nama' => $request->input('nama'),
            'nik' => $request->input('nik'),
            'domisili' => $request->input('domisili'),
            'notelp' => $request->input('notelp'),
        ]);

        Log::info('Data Updated');

        return redirect()->route('databasependuduk')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        Database::destroy($id);

        return redirect()->route('databasependuduk')
            ->with('success', 'Data berhasil dihapus');
    }
}

