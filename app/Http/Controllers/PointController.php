<?php

namespace App\Http\Controllers;

use App\Services\ClauseService;
use App\Services\PointService;
use App\Services\StudentService;
use App\Services\TeacherService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PointController extends Controller
{
    private PointService $pointService;
    private StudentService $studentService;
    private ClauseService $clauseService;
    private TeacherService $teacherService;

    public function __construct(PointService $pointService, StudentService $studentService,ClauseService $clauseService,TeacherService $teacherService)
    {
        $this->pointService = $pointService;
        $this->studentService = $studentService;
        $this->clauseService = $clauseService;
        $this->teacherService = $teacherService;
    }

    public function index():Response
    {
      $points = $this->pointService->findAllByPage();
      return response()->view('point.index',[
        'title' => 'Poin',
        'points' => $points
      ]);
    }
    public function create(Request $request): Response
    {
        $students =$this->studentService->findAll();
        $clauses =$this->clauseService->findByAll();
        $teachers =$this->teacherService->findByAll();
        return response()->view('point.create', [
            'title' => 'Tambah Poin',
            'students' => $students,
            'clauses' => $clauses,
            'teachers' => $teachers
        ]);
    }
    public function doCreate(Request $request): Response|RedirectResponse
    {
        $request->validate([
            'student_id' => 'required',
            'clause_id' => 'required',
            'point_date' => 'required',
            'teacher_id' => 'required',
            ]);

        $point = [
            'student_id' => $request->input('student_id'),
            'clause_id' => $request->input('clause_id'),
            'point_date' => $request->input('point_date'),
            'teacher_id' => $request->input('teacher_id'),
        ];

        if (!$this->pointService->create($point)) {
            return response()->view('point.create', [
                'title' => 'Tambah Poin',
                'error' => 'Tambah Poin gagal'
            ]);
        }

        $request->session()->flash('success', 'Tambah poin berhasil');
        return redirect('/point');
    }
    public function edit(Request $request, int $id): Response|RedirectResponse
    {
        $point = $this->pointService->findById($id);

        if (!$point) {
            $request->session()->flash('error', 'Data poin tidak ditemukan');
            return redirect('/point');
        }
        $students =$this->studentService->findAll();
        $clauses =$this->clauseService->findByAll();
        $teachers =$this->teacherService->findByAll();

        return response()->view('point.edit', [
            'title' => 'Edit Poin',
            'point' => $point,
            'students' => $students,
            'clauses' => $clauses,
            'teachers' => $teachers

        ]);
    }

    public function doEdit(Request $request, int $id)
    {
        $request->validate([
            'student_id' => 'required',
            'clause_id' => 'required',
            'point_date' => 'required',
            'teacher_id' => 'required',
            ]);

        $point = [
            'student_id' => $request->input('student_id'),
            'clause_id' => $request->input('clause_id'),
            'point_date' => $request->input('point_date'),
            'teacher_id' => $request->input('teacher_id'),
        ];
        if (!$this->pointService->update($id, $point)) {
            return response()->view('point.create', [
                'title' => 'Edit Poin',
                'error' => 'Edit Poin gagal'
            ]);
        }

        $request->session()->flash('success', 'Edit poin berhasil');
        return redirect('/point');
    }

    public function doDelete(Request $request, int $id): RedirectResponse
    {
        $point = $this->pointService->findById($id);

        if (!$point) {
            $request->session()->flash('error', 'Data poin tidak ditemukan');
            return redirect('/point');
        }

        if (!$this->pointService->delete($id)) {
            $request->session()->flash('error', 'Hapus poin gagal');
            return redirect('/point');
        }

        $request->session()->flash('success', 'Hapus poin berhasil');
        return redirect('/point');
    }


}
