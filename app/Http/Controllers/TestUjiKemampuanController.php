<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestUjiKemampuan;

class TestUjiKemampuanController extends Controller
{
    public function index()
    {
        $testujikemampuan = TestUjiKemampuan::all();
        return view('testujikemampuan.index', compact('testujikemampuan'));
    }

    public function create()
    {
        return view('testujikemampuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_test' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'anggota_test' => 'required|string',
        ]);

        TestUjiKemampuan::create($request->all());

        return redirect()->route('testujikemampuan.index')->with('success', 'Data test uji kemampuan berhasil disimpan.');
    }

    public function show($id)
    {
        $test = TestUjiKemampuan::findOrFail($id);
        return view('testujikemampuan.show', compact('test'));
    }

    public function edit($id)
    {
        $test = TestUjiKemampuan::findOrFail($id);
        return view('testujikemampuan.edit', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_test' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'tempat_pelaksanaan' => 'required|string|max:255',
            'anggota_test' => 'nullable|string',
        ]);

        $test = TestUjiKemampuan::findOrFail($id);
        $test->update($request->all());

        return redirect()->route('testujikemampuan.index')->with('success', 'Data test uji kemampuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $test = TestUjiKemampuan::findOrFail($id);
        $test->delete();

        return redirect()->route('testujikemampuan.index')->with('success', 'Data test uji kemampuan berhasil dihapus.');
    }
}
