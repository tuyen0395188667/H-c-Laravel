<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    public function XinChao()
    {
        echo "Chao cac ban";
    }

    public function KhoaHoc($ten)
    {
        echo "Khoa hoc: ".$ten;
        // Gọi Route 
        return redirect() -> route("Myroute1");
    }


    // URL
    public function GetURL(Request $request)
    {
        // return $request -> path(); // Hiển thị Route mà đã gọi Hàm này lên
        if ($request -> isMethod('get'))
        {
            echo "Phuong thuc Get";
        }
    }

    // Gửi nhận tham số trên Request
    public function postForm(Request $request)
    {
        echo $request -> HoTen;
    }
}
