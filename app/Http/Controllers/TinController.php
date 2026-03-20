<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    /**
     * Hiển thị trang chủ
     * Route: /
     */
    public function index()
    {
        // Lấy tất cả tin tức, sắp xếp theo ngày mới nhất
        $dsTin = DB::table('tin')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        return view('home', compact('dsTin'));
    }

    /**
     * Hiển thị chi tiết một tin theo ID
     * Route: /tin/{id}
     */
    public function chitiet($id)
    {
        // Lấy thông tin chi tiết của tin
        $tin = DB::table('tin')
            ->where('id', $id)
            ->first();
        
        // Nếu không tìm thấy tin, trả về 404
        if (!$tin) {
            abort(404, 'Không tìm thấy tin tức');
        }
        
        return view('chitiet', compact('tin'));
    }

    /**
     * Hiển thị danh sách tin theo loại
     * Route: /cat/{idLT}
     */
    public function tintrongloai($idLT)
    {
        // Lấy thông tin loại tin
        $loaiTin = DB::table('loaitin')
            ->where('id', $idLT)
            ->first();
        
        // Lấy danh sách tin thuộc loại này
        $dsTin = DB::table('tin')
            ->where('idLT', $idLT)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('tintrongloai', compact('dsTin', 'loaiTin'));
    }
}
