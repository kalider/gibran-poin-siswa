<?php

namespace App\Http\Controllers;

use App\Services\MajorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;

class MajorController extends Controller
{
    private MajorService $majorService;

    public function __construct(MajorService $majorService)
    {
        $this->majorService = $majorService;
    }

    public function index(): Response
    {
       $majors = $this->majorService->findAllbyPage();
       return response()->view('major.index',[
        'title' => 'Jurusan',
        'majors' => $majors
       ]);
    }

    public function create(Request $request): Response
    {
      return response()->view('major.create',[
        'title'=>'Tambah Jurusan'
      ]);
    }

    public function doCreate(Request $request):Response|RedirectResponse
    {
        $request->validate([
            'major_code'=>'required',
            'major_name'=>'required',
            'major_leader'=>'required',
        ]);

        $major=[
            'major_code'=>$request->input('major_code'),
            'major_name'=>$request->input('major_name'),
            'major_leader'=>$request->input('major_leader'),

        ];

        if (!$this->majorService->create($major)) {
            return response()->view('major.create',[
                'title'=>'Tambah Jurusan',
                'error'=>'Tambah Jurusan Gagal'
            ]);
        }
        $request->session()->flash('success','Tambah Jurusan Berhasil');
        return redirect('/major');
    }

    public function edit(Request $request, int $id):Response|RedirectResponse
    {
        $major = $this->majorService->findById($id);

        if (!$major) {
           $request->session()->flash('error','Data jurusan tidak ditemukan');
           return redirect('/major');
        }

        return response()->view('major.edit',[
            'title'=>'Edit Jurusan',
            'major'=> $major
        ]);
    }

    public function doEdit(Request $request,int $id)
    {
        $request->validate([
            'major_code'=>'required',
            'major_name'=>'required',
            'major_leader'=>'required',
        ]);

        $major=[
            'major_code'=>$request->input('major_code'),
            'major_name'=>$request->input('major_name'),
            'major_leader'=>$request->input('major_leader'),

        ];

        if (!$this->majorService->update($id,$major)) {
            return response()->view('major.create',[
                'title'=>'Edit Jurusan',
                'error'=>'Edit Jurusan Gagal'
            ]);
        }

        $request->session()->flash('success','Edit jurusan berhasil');
        return redirect('/major');
    }

    public function doDelete(Request $request, int $id):RedirectResponse
    {
       $major=$this->majorService->findById($id);

       if (!$major) {
        $request->session()->flash('error','Data jurusan Tidak ditemukan ');
        return redirect('/major');
       }

       if (!$this->majorService->delete($id)) {
        $request->session()->flash('error','Hapus jurusan gagal');
        return redirect('/major');
       }
       
       $request->session()->flash('success','Hapus jurusan berhasil');
       return redirect('/major');
    }
}
