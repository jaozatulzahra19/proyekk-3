<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function diagnosa()
    {
        $data = Diagnosa::all();
        $gejala = Gejala::all();
        $user = User::all();
        return view('admin.page.diagnosa', compact('data', 'user', 'gejala'));
    }
    public function insertdiagnosa(Request $request)
    {
        $penyakit = Penyakit::all();
        $user_id = $request->user_id;
        $gejala = $request->gejala;
        // dd($request->gejala);
        $aturan = Rule::all();
        $data = [];
        foreach ($aturan as $key => $atur) {
            foreach ($gejala as $key => $gej) {
                if (str_contains($atur->daftargejala, $gej)) {
                    // dd($atur);
                    array_push($data, [
                        "idpenyakit" => $atur->id_penyakit,
                        "gejala" => $gej
                    ]);
                }
            }
        }
        $hasil = [];
        foreach ($penyakit as $key => $peny) {
            $jum = 0;
            foreach ($data as $key => $dat) {
                if ($peny->id == $dat['idpenyakit']) {
                    $jum += 1;
                }
            }
            array_push($hasil, [
                'idpenyakit' => $peny->id,
                'jum' => $jum
            ]);
        }

        $dataPenyakit = array_reduce($hasil, function ($a, $b) {
            return @$a['jum'] > $b['jum'] ? $a : $b;
        });
        $getpenyakit = Penyakit::where('id', $dataPenyakit['idpenyakit'])->first();

        $store = Diagnosa::create([
            "user_id" => $request->user_id,
            "gejala" => json_encode($request->gejala),
            "hasil" => $dataPenyakit["idpenyakit"],
        ]);

        return redirect()->route('diagnosa');
    }

    public function destroy($id)
    {
        $data = Diagnosa::find($id);
        $data->delete();

        return redirect()->route('diagnosa');
    }
}
