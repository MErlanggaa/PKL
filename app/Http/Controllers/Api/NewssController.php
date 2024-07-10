<?php

namespace App\Http\Controllers\Api;
use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::orderBy('judul','asc')->get();
        return response ()->json([
            'status'=>true,
            'message'=> 'Data Ditemukan',
            'data' =>$data
        ], 202);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
