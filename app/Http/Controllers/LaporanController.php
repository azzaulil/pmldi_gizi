<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseHTTP;
use Validator;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => ['required', 'date'],
            'waktu' => ['required'],
            'foto_pre' => ['required'],
            'foto_post' => ['required'],
            'status' => ['required', 'in:proses,selesai'],
            'id_user' => ['required', 'numeric'],
            'id_makanan' => ['required', 'numeric']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), ResponseHTTP::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $laporan = Laporan::create($request->all());
            $response = [
                'message' => 'Laporan berhasil ditambahkan',
                'data' => $laporan
            ];
            return response()->json($response, ResponseHTTP::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Laporan $laporan
     * @return Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Laporan $laporan
     * @return Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Laporan $laporan
     * @return Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Laporan $laporan
     * @return Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
