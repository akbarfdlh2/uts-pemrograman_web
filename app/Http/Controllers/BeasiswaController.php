<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Beasiswa\BeasiswaModel;

class BeasiswaController extends Controller
{
    public function index()
    {
        return view('pages.beasiswa');
    }

    public function store(Request $request)
    {
        BeasiswaModel::Create([
            'nama'              => $request->nama,
            'description'       => $request->description,
            'tahap'             => $request->tahap,
            'periode'           => $request->periode,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'kuota_beasiswa'    => $request->kuota_beasiswa
        ]);

        return response()->json(['success' => 'Item saved successfully.']);
    }

    public function loadData()
    {   
        return datatables()->of(
                DB::table('beasiswa')
                    ->select('beasiswa.*')
                    ->get()
            )
            ->addColumn('action', function ($data) {
                
                $button =  '<button data-id="' . $data->id . '" class="btn btn-sm btn-primary w-24 mr-1 mb-2 editBeasiswa" style="width: 120px;">
                                Edit
                            </button>';

                $button .= '&nbsp;&nbsp;';
                
                $button .=  '<button data-id="' . $data->id . '" class="btn btn-sm btn-danger w-24 mr-1 mb-2 deleteBeasiswa" style="width: 120px;">
                    Delete
                </button>';

                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function edit(Request $request)
    {
        $beasiswa = DB::table('beasiswa')
            ->where('beasiswa.id', $request->id_beasiswa)
            ->select('beasiswa.*')
            ->first();

        return response()->json($beasiswa);
    }

    public function update(Request $request)
    {
        BeasiswaModel::where('id', $request->id_beasiswa)->update([
            'nama'              => $request->nama,
            'description'       => $request->description,
            'tahap'             => $request->tahap,
            'periode'           => $request->periode,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'kuota_beasiswa'    => $request->kuota_beasiswa
        ]);
        
        return response()->json(['success' => 'Item successfully updated.']);
    }

    public function delete(Request $request)
    {
        BeasiswaModel::where('id', $request->id_beasiswa)->delete();

        return response()->json(['success' => 'Item successfully delete.']);
    }
}
