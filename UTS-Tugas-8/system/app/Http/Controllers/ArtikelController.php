<?php

namespace App\Http\Controllers;

use App\Models\Artikel;


class ArtikelController extends Controller
{
    function index()
    {
        $user = request()->user();
        $data['list_artikel'] = $user->artikel;
        return view('template-admin.artikel.index', $data);
    }
    function create()
    {
        return view('template-admin.artikel.create');
    }
    function store()
    {
        $artikel = new Artikel();
        $artikel->id_user = request()->user()->id;
        $artikel->judul = request('judul');
        $artikel->penulis = request('penulis');
        $artikel->deskripsi = request('deskripsi');
        $artikel->save();

        return redirect('admin/artikel')->with('success', 'Data Berhasil Ditambahkan');
    }
    function show($artikel)
    {
        $data['artikel'] = Artikel::find($artikel);
        return view('template-admin.artikel.show', $data);
    }
    function edit(Artikel $artikel)
    {
        $data['artikel'] =  $artikel;
        return view('template-admin.artikel.edit', $data);
    }
    function update(Artikel $artikel)
    {
        $artikel->judul = request('judul');
        $artikel->penulis = request('penulis');
        $artikel->deskripsi = request('deskripsi');
        $artikel->save();

        return redirect('admin/artikel')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect('admin/artikel')->with('danger', 'Data Berhasil Dihapus');
    }

    function filter()
    {
        $judul = request('judul');
        $data['judul'] = $judul;

        $data['list_artikel'] = Artikel::where('judul', 'like', "%$judul%")->get();

        return view('template-admin.artikel.index', $data);
    }
}
