<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data dari database
        $events = DB::table('events')->select('theme', 'name', 'category', 'time','desc','id', 'image')->get();

        //tampilkan data untuk debugging (hapus atau pindahkan sesuai kebutuhan)
        // dd($news);

        $view_datas= ['eventeuy'=> $events];

        return view('admin.event', $view_datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.formAdm.form_event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'theme' => 'required',
            'name' => 'required',
            'category' => 'required',
            'time' => 'required',
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Adjust validation rules as needed
        ]);

        // Request data from the form
        $theme = $request->input('theme');
        $name = $request->input('name');
        $category = $request->input('category');
        $time = $request->input('time');
        $desc = $request->input('desc');
        $image = $request->file('image'); // Corrected: use $request->file('image') instead of $request->photo

        $imageEvent = null;

        if ($image) {
            $imageEvent = $image->store('img-e', 'public');
        }

        // Insert data into the database
        $events = DB::table('events')->insert([
            'theme' => $theme,
            'name' => $name,
            'category' => $category,
            'time' => $time,
            'desc' => $desc,
            'image' => $imageEvent,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        // Check if data was successfully inserted
        if ($events) {
            return redirect('adm/event')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect('adm/event')->with('error', 'Data Gagal Ditambahkan');
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
        $event = DB::table('events')
        ->select('id', 'theme', 'name','category', 'time', 'desc', 'image')
        ->where('id', '=', $id)
        ->first();

        $views_data = ['event' => $event];

        return view('admin.detailAdm.detail_event', $views_data);
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
        $event = DB::table('events')
        ->select('id', 'theme', 'name', 'category', 'time', 'desc')
        ->where('id', '=', $id)
        ->first();

        $views_data= ['event' => $event];

        return view('admin.UpdateAdm.eventUpdate', $views_data);
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
        // Request data from the form
        $theme = $request->input('theme');
        $name = $request->input('name');
        $category = $request->input('category');
        $time = $request->input('time');
        $desc = $request->input('desc');

        // update data dengan id yang sama
        DB::table('events')->where('id', $id)->update([
            'theme' => $theme,
            'name' => $name,
            'category' => $category,
            'time' => $time,
            'desc' => $desc,
            'updated_at' => now(),
        ]);

        return redirect('adm/event')->with(['succes' => 'Data berhasil di input']);
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
        DB::table('events')->where('id',$id)->delete();

        return redirect('adm/event')->with(['succes' => 'Data berhasil di hapus']);
    }
}
