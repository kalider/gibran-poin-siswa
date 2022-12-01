<?php

namespace App\Http\Controllers;

use App\Services\ClauseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClauseController extends Controller
{
    private ClauseService $clauseService;

    public function __construct(ClauseService $clauseService)
    {
        $this->clauseService = $clauseService;
    }
    
    public function index(): Response
    {
        $clauses = $this->clauseService->findAllByPage();
        return response()->view('clause.index', [
            'title' => 'Pasal',
            'clauses' => $clauses
        ]);
    }

    public function create(Request $request): Response
    {
        return response()->view('clause.create', [
            'title' => 'Tambah Pasal'
        ]);
    }

     
    public function doCreate(Request $request): Response|RedirectResponse
    {
        $request->validate([
        'chapter' =>'required|unique:clauses,chapter',
        'clause_type' =>'required|unique:clauses,clause_type',
        'clause_score' => 'required',
        ]);

        $clause = [
            'chapter' =>$request->input('chapter'),
            'clause_type' =>$request->input('clause_type'),
            'clause_score' => $request->input('clause_score'),
        ];
        if (!$this->clauseService->create($clause)) {
            return response()->view('clause.create',[
                'title' => 'Tambah Pasal',
                'error' => 'Tambah Pasal Gagal'
            ]);
        }

        $request->session()->flash('success', 'Tambah pasal berhasil');
        return redirect('/clause');

    }

    public function edit(Request $request, int $id): Response|RedirectResponse
    {
        $clause = $this->clauseService->findById($id);

        if (!$clause) {
            $request->session()->flash('error', 'Data pasal tidak ditemukan');
            return redirect('/clause');
        }

        return response()->view('clause.edit', [
            'title' => 'Edit Pelanggan',
            'clause' => $clause
        ]);
    }

    public function doEdit(Request $request, int $id)
    {
        $clause = $this->clauseService->findById($id);

        $request->validate([
            'chapter' =>'required|unique:clauses,chapter,'. $clause->chapter,
            'clause_type' =>'required|unique:clauses,clause_type,'. $clause->clause_type,
            'clause_score' => 'required',
            ]);
    
            $clause = [
                'chapter' =>$request->input('chapter'),
                'clause_type' =>$request->input('clause_type'),
                'clause_score' => $request->input('clause_score'),
            ];
        if (!$this->clauseService->update($id, $clause)) {
            return response()->view('clause.create', [
                'title' => 'Edit Pasal',
                'error' => 'Edit Pasal gagal'
            ]);
        }

        $request->session()->flash('success', 'Edit pasal berhasil');
        return redirect('/clause');
    }

    public function doDelete(Request $request, int $id): RedirectResponse
    {
        $clause = $this->clauseService->findById($id);

        if (!$clause) {
            $request->session()->flash('error', 'Data pasal tidak ditemukan');
            return redirect('/clause');
        }

        if (!$this->clauseService->delete($id)) {
            $request->session()->flash('error', 'Hapus pasal gagal');
            return redirect('/clause');
        }

        $request->session()->flash('success', 'Hapus pasal berhasil');
        return redirect('/clause');
    }

}
