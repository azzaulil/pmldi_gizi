<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Doctrine\DBAL\Query\QueryException;
use http\Env\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseHTTP;
use Validator;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_makanan' => ['required'],
            'harga' => ['required'],
            'porsi' => ['required', 'numeric'],
            'label' => ['in:sangat baik,baik,buruk'],
            'foto_makanan' => ['required'],
            'id_kantin' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), ResponseHTTP::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $makanan = Makanan::create($request->all());
            $response = [
                'message' => 'Makanan berhasil ditambahkan',
                'data' => $makanan
            ];
            return \response()->json($response, ResponseHTTP::HTTP_CREATED);
        } catch (QueryException $e){
            return \response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Makanan $makanan
     * @return \Illuminate\Http\Response
     */
    public function show(Makanan $makanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Makanan $makanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Makanan $makanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Makanan $makanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makanan $makanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Makanan $makanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makanan $makanan)
    {
        //
    }
}
