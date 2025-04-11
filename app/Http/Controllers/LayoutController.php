<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    function sach()
    {
        $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
        return view("viewbook.index", compact("data"));
    }

    function theloai($id)
    {
        $data = DB::select("select * from sach where id_the_loai = ?",[$id]);
        return view("viewbook.index", compact("data"));
    }

    function chitiet($id)
    {
        $data = DB::select("select * from sach where id = ?",[$id])[0];
        return view("viewbook.chitiet", compact("data"));
    }

    public function book()
    {
        $data = DB::table("sach")->get();
        return view("qlsach.book" , compact('data'));
    }
}
