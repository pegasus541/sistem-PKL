<?php

namespace App\Http\Controllers;
use App\DataMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MahasiswaImport;
use App\Imports\UserMahasiswaImport;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('koordinatorpkl.mahasiswa', ['mahasiswas' => $mahasiswas]);
    }

    public function store(Request $request)
    {
        //Checking there is a file to upload or not
        if (!$request->hasFile('file')) {
            return redirect()->back()->with('error', 'Pilih sebuah file untuk diunggah');
        }
        // File Validation and excel extension
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls'
        ]);
        

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMahasiswa', $namaFile);

        // Proses file Excel
        Excel::import(new MahasiswaImport, public_path('/DataMahasiswa/'.$namaFile));
        Excel::import(new UserMahasiswaImport, public_path('/DataMahasiswa/'.$namaFile));

        return redirect()->back()->with('success', 'Data berhasil diunggah.');
    }

    public function edit($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('mahasiswa',[
            'mahasiswa' => $mahasiswa,
            'route' => route('mahasiswa-update', $mahasiswa->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);

        $request->validate([
            'nim' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $mahasiswa->update([
            
            'nim' => $request->nim,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('mahasiswa')->with('success', 'Berhasil mengupdate mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa')->with('success', 'Berhasil menghapus mahasiswa');
    }


}
