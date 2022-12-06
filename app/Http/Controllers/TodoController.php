<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{

    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan halaman
        return view('page.gaming');   

    }
    public function dashboard()
    {
        //untuk menampilkan halaman
        return view('home.dashboard');  

    }
    public function julyon()
    {
        return view('home.julyon');
    }

    public function register()
    {
        return view('page.register');
    }

    public function admin()
    {
        return view('page.admin');
    }

    public function landing()
    {
        return view('page.landing');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
        //menapilkan page create/tambah
    }

    public function data()
    {
        $todos = Todo::all();
        return view('page.data', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //mengirim data baru ke DB
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);
        //yang '' = nama column
        //yang $request-> = value name di input
        /* kenapa kirim 5 data pahadal di input ada 3 inputan? kalau dicek di table todos itukan ada 6 
        column yang harus diisi, salah satunya column done_date yang nullable, kalau nullable itu 
        gausa diisi gapapa jadi ga usah diisi dlu */
        //user_id ngambil dari id dari fitur auth (history login), supaya tau itu todo punya siapa 
        //column status kan boolean, jadi kalau status si todo belum dikerjain = 0
        Todo::create([
            'title'=> $request->title,
            'date'=> $request->date,
            'description'=> $request->description,
            'user_id'=> Auth::User()->id,
            'status'=> 0,
        ]);

        return redirect('/data')->with('abc', 'a');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //menampilkan satu data spesifik
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan form edit 
        // parameter $id mengambil data path dinamis {$id}
        /* ambil satu baris data yang memiliki value column id sama dengan data path
        dinamis id yang dikirim ke route */
        $todo = Todo::where('id', $id)->first();
        /* kemudian arahkan/tampilan file view yang bernama edit.balde.php
        dan kirim data dari $todo ke file edit tersebut dengan bantuan compact */
        return view('page.edit', compact('todo'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengupdate data di DB
        //validasi
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:8',
        ]);

        // cari basis data yang punya value column id sama dengan id yang dikirim ke route
        Todo::where('id', $id)->update([
            'title'=>$request->title,
            'date'=>$request->date,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
            'status' => 0,

        ]);

        return redirect('/data')->with('op', 'a');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data di DB
        // cari data yang mau dihapus, kalau ketemu langsung dihapus datanya
        Todo::where('id', $id)->delete();
        // kalau berhasil arahin lagi ke halaman data dengan notif
        return redirect('/data')->with('ol', 'b');

    }

    public function updateToComplated(Request $request, $id)
    {
        //cari data yang akan di update
        //baru setelahnya data di update ke database melalui model
        //status tipenya boolean (0/1) : 0 (on-process) dan 1 (complated)
        //carbon : package laravel yang mengelola segala hal yang berhubungan dengan date
        //now() : mengambil tanggal hari ini
        // dd(\Carbon\Carbon::now());
        Todo::where('id', '=', $id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);
        /* jika berhasil, akan dibalikkan ke halaman awal 
        (halaman tempat button complated berada) kembalikan dengan pemberitahuan */
        return redirect()->back()->with('wow', 'aa');
    }
}
