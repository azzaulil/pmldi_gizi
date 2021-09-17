<?php

namespace App\Http\Controllers;

use App\Models\Kantin;
use App\Models\Laporan;
use App\Models\Makanan;
use App\Models\Nutrisi;
use App\Models\NutrisiMakanan;
use App\Models\User;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function userAll()
    {
        $user = User::all();
        $response = [
            'message' => 'List semua user',
            'data' => $user
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function userData($id)
    {
        try {
            $user = User::findOrFail($id);
            $response = [
                'message' => 'Berhasil mengambil data user',
                'data' => $user
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed: " . $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function makananAll()
    {
        $makanan = Makanan::all();
        $response = [
            'message' => 'List semua makanan',
            'data' => $makanan
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function laporanAll()
    {
        $laporan = Laporan::all();
        $response = [
            'message' => 'List semua laporan',
            'data' => $laporan
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function makananKantin($id)
    {
        try {
            $makanan = Makanan::query()->select('*')
                ->from('makanans as m')
                ->where('id_kantin', '=', $id)
                ->get();
            $response = [
                'message' => 'Berhasil mengambil data makanan',
                'data' => $makanan
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => "Failed: " . $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function kantin()
    {
        $kantin = Kantin::all();
        $response = [
            'message' => 'List kantin',
            'data' => $kantin
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function nutrisi()
    {
        $nutrisi = Nutrisi::all();
        $response = [
            'message' => 'List nutrisi',
            'data' => $nutrisi
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function nutrisiMakanan($id_makanan)
    {
        try {
            $makanans = Makanan::findOrFail($id_makanan);
            $nutrisi_makanan = NutrisiMakanan::query()
                ->select('n.nama_nutrisi', 'nm.nilai_nutrisi', 'n.satuan')
                ->from('nutrisi_makanans as nm')
                ->join('nutrisis as n', 'nm.id_nutrisi', '=', 'n.id')
                ->where('id_makanan', '=', $makanans['id'])
                ->get();
            $makanans->nutrisi = $nutrisi_makanan;

            $response = [
                'message' => 'Berhasil mengambil data makanan',
                'data' => $makanans
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => "Failed: " . $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
