<?php

namespace App\Http\Controllers;
use App\DataDosen;
use Illuminate\Http\Request;
use App\Models\Dosen;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DosenImport;
use App\Imports\UserDosenImport;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::all();
        return view('koordinatorpkl.dosen', ['dosens' => $dosens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $file->move('DataDosen', $namaFile);

        // Proses file Excel
        Excel::import(new DosenImport, public_path('/DataDosen/'.$namaFile));
        Excel::import(new UserDosenImport, public_path('/DataDosen/'.$namaFile));

        return redirect()->back()->with('success', 'Data berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
