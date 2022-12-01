<?php

namespace App\Http\Controllers;

use App\Services\ClassGroupService;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use illuminate\Pagination\Paginator;

class StudentController extends Controller
{
    private StudentService $studentService;
    private ClassGroupService $classgroupService;

    public function __construct(StudentService $studentService,ClassGroupService $classGroupService)
    {
        $this->studentService = $studentService;
        $this->classgroupService = $classGroupService;
    }

    public function index(Request $request): Response
    {
        $q = $request->input('q');

        $students = $this->studentService->findAllByPage($q);
        return response()->view('student.index', [
            'title' => 'Siswa',
            'students' => $students
        ]);
    }

    public function create(Request $request): Response
    {
        $classgroups=$this->classgroupService->findAll();
        return response()->view('student.create',[
            'title'=> 'Tambah Siswa',
            'classgroups' => $classgroups
        ]);
    }

    public function doCreate(Request $request): Response|RedirectResponse
    {
        $request->validate([
            'nis'=>'required|unique:students,nis',
            'name'=>'required',
            'bday'=>'required',
            'bplace'=>'required',
            'gender'=>'required',
            'class_id' => 'required',
        ]);

        $student = [
            'nis'=>$request->input('nis'),
            'name'=>$request->input('name'),
            'bday'=>$request->input('bday'),
            'bplace'=>$request->input('bplace'),
            'gender'=>$request->input('gender'),
            'class_id'=>$request->input('class_id'),
        ];

        if (!$this->studentService->create($student)) {
            return response()->view('student.create',[
                'title'=>'Tambah Pelanggan',
                'error'=>'Tambah Pelanggan Gagal'
            ]);            
        }

        $request->session()->flash('success','Tambah Siswa Berhasil');
        return redirect('/student');
    }

    public function edit(Request $request, int $id):Response|RedirectResponse
    {
      $student =$this->studentService->findById($id);

      if (!$student) {
        $request->session()->flash('error','Data siswa tidak ditemukan');
        return redirect('/student');
      }
      $classgroups=$this->classgroupService->findAll();
      
      return response()->view('student.edit',[
        'title' => 'Edit Siswa',
        'student' => $student,
        'classgroups' => $classgroups,
      ]);
    }
      public function doEdit(Request $request, int $id)
      {
       $request->validate([
        'nis'=>'required|unique:students,nis',
        'name'=>'required',
        'bday'=>'required',
        'bplace'=>'required',
        'gender'=>'required',
        'class_id' => 'required',
       ]);

       $student =[
        'nis'=>$request->input('nis'),
        'name'=> $request->input('name'),
        'bday'=> $request->input('bday'),
        'bplace'=> $request->input('bplace'),
        'gender'=> $request->input('gender'),
        'class_id'=>$request->input('class_id'),
       ];

       if (!$this->studentService->update($id,$student)) {
       return response()->view('student.create',[
        'title'=>'Edit Siswa',
        'error'=>'Edit Siswa Gagal'
       ]);
       }

       $request->session()->flash('success','Edit Siswa Berhasil');
       return redirect('/student');
      }


     public function doDelete(Request $request, int $id):RedirectResponse
     {
        $student =$this->studentService->findById($id);

        if (!$student) {
           $request->session()->flash('error','Data siswa tidak ditemukan');
           return redirect('/student');
        }

        if (!$this->studentService->delete($id)) {
            $request->session()->flash('error','Hapus Siswa Gagal');
            return redirect('/student');
        }
        $request->session()->flash('success','Hapus Siswa Berhasil');
        return redirect('/student');
     } 


 }




