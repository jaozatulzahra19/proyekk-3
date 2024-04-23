<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Alert;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rule::all();
        
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin.page.rule', compact('data', 'penyakit', 'gejala'));
    }

    public function insertrule(Request $request)
    {
        if (!empty($request->input('daftargejala'))) {
            $data = Rule::create([
                'id_penyakit' => $request->input('id_penyakit'),
                // 'namapenyakit' => $request->input('namapenyakit'),
                'daftargejala' => join(' - ', $request->input('daftargejala')),
            ]);
            // dd($data);
        }
        return redirect()->route('indexrule');
    }

    public function editrule($id)
    {
        $data = Rule::find($id);

        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('admin.page.edit_rule', compact('data', 'penyakit', 'gejala'));
    }

    public function updaterule(Request $request, $id)
    {
        if (!empty($request->input('daftargejala'))) {
            $data = Rule::find($id);
            if ($data) {
                $data->id_penyakit = $request->input('id_penyakit');

                $daftargejala = $request->input('daftargejala');
                if (is_array($daftargejala)) {
                    $daftargejala = join(' - ', $daftargejala);
                }

                $data->daftargejala = $daftargejala;
                $data->save();
            }
        }

        return redirect()->route('indexrule');
    }
    // public function deleterule($id)
    // {
    //     $data = Rule::find($id)->delete();
    //     return redirect()->route('indexrule');
    // }
    
    public function destroy($id)
    {
        $data = Rule::find($id);
        $data->delete();

        return redirect()->route('indexrule');
    }
}
