<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ambil data dari database
        $news = DB::table('berita')
            ->select("name", "desc", "created_at", "id", "image")
            ->orderBy('created_at', 'desc')
            ->get();

        // Tampilkan data untuk debugging (hapus atau pindahkan sesuai kebutuhan)


        // Kirim data ke tampilan
        $views_data = ['news' => $news];

        return view('admin.berita', $views_data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.formAdm.form_berita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'imageBerita' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        $name = $request->input('name');
        $desc = $request->input('desc');
        $image = $request->file('imageBerita');

        $imageJalur = null;

        if ($image) {
            $imageJalur = $image->store('berita-img', 'public'); // Simpan gambar di direktori public/aset
        }

        $news = DB::table('berita')->insert([
            'name' => $name,
            'desc' => $desc,
            'image' => $imageJalur,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($news) {
            return redirect('adm/berita')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('adm/berita')->with('error', 'Data Gagal Ditambahkan');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ambil data
        // first digunakan untuk m
        $news = DB::table('berita')
        ->select(['id', 'name', 'desc', 'created_at'])
        ->where('id', '=',$id)
        ->first();


        $views_data = ['berita' => $news ];

        return view('admin.detailAdm.detail_berita', $views_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //ambil data
        $news = DB::table('berita')->select('name', 'id', 'desc', 'created_at')
        // cari data yang sesuai dengan id
        ->where('id', $id)->first();

        $views_data = ['berita' => $news];

        return view('admin.UpdateAdm.beritaUpdate', $views_data);
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
        // request input pada form
        $name = $request->input('name');
        $desc = $request->input('desc');

        //kirim data dengan id yang sama
        DB::table('berita')->where('id', '=', $id)
        ->update([
            'name' => $name,
            'desc' => $desc,
            'updated_at'=> date('Y:m:d H:i'),
        ]) ;

        // validasi

        return redirect('adm/berita')->with(['succes' => 'data Berhasil diupdate']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data
        DB::table('berita')->where('id', $id)->delete();

        return redirect('adm/berita');
    }
}
