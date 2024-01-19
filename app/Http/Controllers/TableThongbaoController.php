<?php

namespace App\Http\Controllers;

use App\Models\table_thongbao;
use Illuminate\Http\Request;

class TableThongbaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {

            $index = table_thongbao::query()->pluck('noidung');
            $index1 = table_thongbao::query()->pluck('ten');
//            dd($index1);
//            $html = $index->noidung;
//            dd($html);
            return view('index', compact('index','index1'));


        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(table_thongbao $table_thongbao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(table_thongbao $table_thongbao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, table_thongbao $table_thongbao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(table_thongbao $table_thongbao)
    {
        //
    }
}
