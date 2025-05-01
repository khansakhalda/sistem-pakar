<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicationRequest;
use App\Services\Indication\IndicationService;
use App\Models\Indication;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt;

class IndicationController extends Controller
{

    public function __construct(private IndicationService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->service->getAll();

        return view('Dashboard.gejala.gejala', ['data' => $data]);
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
    public function store(IndicationRequest $request)
    {
        $stmt = $this->service->store($request);
        if ($stmt) {
            return redirect('dashboard/gejala')->with(['success' => 'Tambah Berhasil']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Indication $indication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        return view('Dashboard.gejala.edit',  ['data' => $data[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndicationRequest $request, $id)
    {
        $stmt = $this->service->update($request, $id);
        if ($stmt) {
            return redirect('dashboard/gejala')->with(['success' => 'Edit Berhasil']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect('dashboard/gejala')->with(['success' => 'Hapus Berhasil']);
    }
}
