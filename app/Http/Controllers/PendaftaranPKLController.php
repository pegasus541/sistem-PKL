<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranPkl;
use App\Models\mahasiswa;
use App\Models\Mitra;
use App\Models\Plotting;
use Illuminate\Http\Request;

class PendaftaranPKLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); // Ambil data mahasiswa dari database
        $mitras = Mitra::all();
        return view('mahasiswa.pendaftaran', 
        [
            'mahasiswas' => $mahasiswas,
            'mitras' => $mitras,
        ]);
    }

    public function showProposal()
    {
        
    
        return view('mahasiswa.proposal'); // Assuming you have a "proposal.blade.php" view
    }

    public function showPembimbing()
    {
        $plottings = Plotting::all();
    
        return view('mahasiswa.pembimbing',
        [
            'plottings'=> $plottings
        ]);
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
        // File Validation and pdf extension
        $this->validate($request, [
            'jumlah_anggota' => 'required|integer',
            'nama_perusahaan_tempat_pkl' => 'required|string',
            'durasi_pkl' => 'required|string',
            'tanggal_mulai_pkl' => 'required|date',
            'tanggal_selesai_pkl' => 'required|date',
            'kontak_perusahaan' => 'required|string',
            'surat_penerimaan' => 'required|mimes:pdf|max:2048'
        ]);

        $file = $request->file('surat_penerimaan');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // Get original filename without extension
        $extension = $file->getClientOriginalExtension(); // Get file extension
        $uniqueName = $originalName . '_' . date('YmdHis') . '.' . $extension; // Combine unique name

        $file->move('SuratPenerimaan', $uniqueName); //Save the file to specified folder

        $data = $request->except(['_token']);
        $data['surat_penerimaan'] = $uniqueName; // Save the unique file name to the database
        PendaftaranPkl::insert($data);
        return redirect()->route('pendaftaran-pkl')->with('success', 'Berhasil melakukan pendaftaran');
    }

    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
