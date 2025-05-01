<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuleRequest;
use App\Models\Indication;
use App\Models\Rule;
use App\Services\Rule\RuleService;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function __construct(private RuleService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->service->getAll();
        return view(
            'Dashboard.pengetahuan.pengetahuan',
            $data
        );

        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data = $this->service->create();
        // dd($data['term'][0]['nilai']);
        return view('Dashboard.pengetahuan.add',  $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RuleRequest $request)
    {

        // dd($request->kode_gejala);
        $stmt = $this->service->store($request);
        if ($stmt) {
            return redirect('dashboard/pengetahuan')->with(['success' => 'Tambah Berhasil']);
        } else {
            dd($request);
        }
        // dd($stmt);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        // dd($data);
        return view('Dashboard.pengetahuan.edit',  $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RuleRequest $request, $id)
    {
        $data = $this->service->update($request, $id);
        // dd($request);
        return redirect('dashboard/pengetahuan')->with(['success' => 'Edit Berhasil']);
    }
    public function getData(Request $request)
    {
        $selectedValue = $request->input('selectedValue');
        // Mengambil data sesuai dengan nilai yang diterima
        $selected =  ['G01'];
        $col = collect([]);
        $select = Rule::where('kode_penyakit', $selectedValue)->get();
        foreach ($select as $g) {
            $col->push($g->kode_gejala);
        }
        $data = Indication::whereNotIn('kode_gejala', $col)->get();

        return response()->json($data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect('dashboard/pengetahuan')->with(['success' => 'Hapus Berhasil']);
    }
}
