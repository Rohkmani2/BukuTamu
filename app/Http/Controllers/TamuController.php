<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamu = DB::table('tamu')->get();
        return view('tamu.tamu', ['tamu' => $tamu]);
    }

    public function cetak()
    {
        $tamu = DB::table('tamu')->get();
        return view('tamu.cetak', ['tamu' => $tamu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tamu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'instansi' => 'required',
            'tanggal' => 'required',
            'bidang_terkait' => 'required',
            'keperluan' => 'required',
        ]);
        
        $tamu = Tamu::create($request->all());
        if ($request->hasfile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $extention = $file->getClientOriginalName();
            $filename = time() . '.' . $extention;
            $file->move('foto_ktp/', $filename);
            $tamu->foto_ktp = $filename;
        }

        if ($request->hasfile('foto_webcam')) {
            $file = $request->file('foto_webcam');
            $extention = $file->getClientOriginalName();
            $filename = time() . '.' . $extention;
            $file->move('foto_webcam/', $filename);
            $tamu->foto_webcam = $filename;
        }

        $top = $tamu->save();
        if($top){
            return redirect('/')->with('success', 'Pendaftaran Tamu berhasil ditambahkan');
        } else {
            return back()->with('fail',' Terdapat kesalahan saat memasukan data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show(Tamu $tamu)
    {
        return view('tamu.buka');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('tamu.ubah', compact('tamu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = $request->all();
        $tamu = Tamu::find($id);
        if ($request->hasfile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $extention = $file->getClientOriginalName();
            $filename = time() . '.' . $extention;
            $file->move('foto_ktp/', $filename);
            $edit['foto_ktp'] = $filename;
        }

        $tamu->update($edit);
        return redirect('tamu')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tamu = Tamu::find($id);

        $tamu->delete();

        return redirect('tamu')->with('success', ' Penghapusan berhasil.');
    }
    public function unduhpdf()
    {
        $data = Tamu::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('printpdf')->setpaper('A4','potrait');
        return $pdf->download('Laporan_Data_Tamu.pdf');
    }

}

