<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeseaseRequest;
use App\Models\Desease;
use App\Services\Desease\DeseaseService;
use Illuminate\Http\Request;

class DeseaseController extends Controller
{

    public function __construct(private DeseaseService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->service->getAll();
        return view('Dashboard.penyakit.penyakit', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.penyakit.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeseaseRequest $request)
    {
        $stmt = $this->service->store($request);
        if ($stmt) {
            return redirect('dashboard/penyakit')->with(['success' => 'Tambah Berhasil']);
        } else {
            dd($request);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Desease $desease)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->service->find($id);
        return view('Dashboard.penyakit.edit',  ['data' => $data[0]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeseaseRequest $request, $id)
    {
        $stmt = $this->service->update($request, $id);
        if ($stmt) {
            return redirect('dashboard/penyakit')->with(['success' => 'Edit Berhasil']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect('dashboard/penyakit')->with(['success' => 'Hapus Berhasil']);
    }
}
