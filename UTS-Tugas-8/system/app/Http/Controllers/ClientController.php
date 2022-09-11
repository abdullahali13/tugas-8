<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Komen;

class ClientController extends Controller
{
    function showArtikel(Artikel $artikel)
    {
        $data['artikel'] = $artikel;
        $data2['list_komen'] = Komen::all();
        return view('fontend.show', $data, $data2);
    }
    function showHome()
    {
        $data['list_artikel'] = Artikel::all();
        return view('fontend.home', $data);
    }
}
