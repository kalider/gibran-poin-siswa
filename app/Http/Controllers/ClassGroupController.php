<?php

namespace App\Http\Controllers;

use App\Services\ClassGroupService;
use App\Services\MajorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassGroupController extends Controller
{
    private ClassGroupService $classgroupService;
    private MajorService $majorService;

    public function __construct(ClassGroupService $classgroupService, MajorService $majorService)
    {
        $this->classgroupService = $classgroupService;
        $this->majorService = $majorService;
    }

    public function index(): Response
    {
        $classgroups =$this->classgroupService->findAllByPage();
        return response()->view('classgroup.index',[
            'title' => 'Kelas',
            'classgroups' => $classgroups
        ]);
    }

    public function create(Request $request): Response
    {
        $majors = $this->majorService->findAll();

        return response()->view('classgroup.create',[
            'title' => 'Tambah Kelas',
            'majors' => $majors
        ]);
    }

    public function doCreate(Request $request):Response|RedirectResponse
    {
        $request->validate([
            'class_name' => 'required|unique:classgroups,class_name',
            'homeroom_teacher' => 'required',
            'major_id' => 'required',
        ]);

        $classgroup =[
            'class_name' => $request->input('class_name'),
            'homeroom_teacher' => $request->input('homeroom_teacher'),
            'major_id' => $request->input('major_id'),
        ];

        if (!$this->classgroupService->create($classgroup)) {
            return response()->view('classgroup.create',[
                'title' => 'Tambah Kelas',
                'error' => 'Tambah Kelas Gagal',
            ]);
        }

        $request->session()->flash('success','Tambah Kelas Berhasil');
        return redirect('/classgroup');
    }

    public function edit(Request $request,int $id):Response|RedirectResponse
    {
       $classgroup = $this->classgroupService->findById($id);

       if (!$classgroup) {
        $request->session()->flash('error','Data kelas tidak ditemukan');
        return redirect('/classgroup');
       }

        $majors = $this->majorService->findAll();   

       return response()->view('classgroup.edit',[
        'title' => 'Edit Kelas',
        'classgroup' => $classgroup,
        'majors' => $majors,
       ]);
    }

    public function doEdit(Request $request,int $id)
    {
        $request->validate([
            'class_name' => 'required|unique:classgroups,class_name',
            'homeroom_teacher' => 'required',
            'major_id' => 'required',
        ]);

        $classgroup =[
            'class_name' => $request->input('class_name'),
            'homeroom_teacher' => $request->input('homeroom_teacher'),
            'major_id' => $request->input('major_id'),
        ];

        if (!$this->classgroupService->update($id, $classgroup)) {
            return response()->view('classgroup.create',[
                'title' => 'Edit Kelas',
                'error' => 'Edit Kelas Gagal'
            ]);
        }

        $request->session()->flash('success','Edit Kelas Berhasil');
        return redirect('/classgroup');
    }

    public function doDelete(Request $request, int $id):RedirectResponse
    {
       $classgroup=$this->classgroupService->findById($id);

       if (!$classgroup) {
        $request->session()->flash('error','Data Kelas Tidak ditemukan ');
        return redirect('/classgroup');
       }

       if (!$this->classgroupService->delete($id)) {
        $request->session()->flash('error','Hapus Kelas gagal');
        return redirect('/classgroup');
       }
       
       $request->session()->flash('success','Hapus Kelas berhasil');
       return redirect('/classgroup');
    }


}