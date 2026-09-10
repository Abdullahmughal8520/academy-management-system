<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\ResultItem;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['student', 'exam'])
            ->latest()
            ->get();

        return view('results.index', compact('results'));
    }

    public function create()
    {
       $students = Student::orderBy('first_name')->get();
        $exams = Exam::where('status', 'active')
            ->latest()
            ->get();

        $subjects = Subject::orderBy('name')->get();

        return view('results.create', compact(
            'students',
            'exams',
            'subjects'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',

            'subjects' => 'required|array|min:1',

            'subjects.*.subject_id' =>
                'required|exists:subjects,id',

            'subjects.*.total_marks' =>
                'required|numeric|min:0',

            'subjects.*.obtained_marks' =>
                'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated) {

            $totalMarks = 0;
            $obtainedMarks = 0;

            foreach ($validated['subjects'] as $subject) {

                $totalMarks += (float) $subject['total_marks'];
                $obtainedMarks += (float) $subject['obtained_marks'];
            }

            $percentage = $totalMarks > 0
                ? ($obtainedMarks / $totalMarks) * 100
                : 0;

            $grade = $this->calculateGrade($percentage);

            $result = Result::create([
                'student_id' => $validated['student_id'],
                'exam_id' => $validated['exam_id'],
                'total_marks' => $totalMarks,
                'obtained_marks' => $obtainedMarks,
                'percentage' => round($percentage, 2),
                'grade' => $grade,
            ]);

            foreach ($validated['subjects'] as $subject) {

                $subjectTotal = (float) $subject['total_marks'];
                $subjectObtained = (float) $subject['obtained_marks'];

                $subjectPercentage = $subjectTotal > 0
                    ? ($subjectObtained / $subjectTotal) * 100
                    : 0;

                ResultItem::create([
                    'result_id' => $result->id,
                    'subject_id' => $subject['subject_id'],
                    'total_marks' => $subjectTotal,
                    'obtained_marks' => $subjectObtained,
                    'percentage' => round($subjectPercentage, 2),
                    'grade' => $this->calculateGrade(
                        $subjectPercentage
                    ),
                ]);
            }
        });

        return redirect()
            ->route('results.index')
            ->with('success', 'Result created successfully.');
    }

    public function show(Result $result)
    {
        $result->load([
            'student',
            'exam',
            'items.subject'
        ]);

        return view('results.show', compact('result'));
    }

    public function edit(Result $result)
    {
        $result->load('items');

        $students = Student::orderBy('first_name')->get();

        $exams = Exam::latest()->get();

        $subjects = Subject::orderBy('name')->get();

        return view('results.edit', compact(
            'result',
            'students',
            'exams',
            'subjects'
        ));
    }

    public function update(Request $request, Result $result)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_id' => 'required|exists:exams,id',

            'subjects' => 'required|array|min:1',

            'subjects.*.subject_id' =>
                'required|exists:subjects,id',

            'subjects.*.total_marks' =>
                'required|numeric|min:0',

            'subjects.*.obtained_marks' =>
                'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated, $result) {

            $totalMarks = 0;
            $obtainedMarks = 0;

            foreach ($validated['subjects'] as $subject) {

                $totalMarks += (float) $subject['total_marks'];
                $obtainedMarks += (float) $subject['obtained_marks'];
            }

            $percentage = $totalMarks > 0
                ? ($obtainedMarks / $totalMarks) * 100
                : 0;

            $result->update([
                'student_id' => $validated['student_id'],
                'exam_id' => $validated['exam_id'],
                'total_marks' => $totalMarks,
                'obtained_marks' => $obtainedMarks,
                'percentage' => round($percentage, 2),
                'grade' => $this->calculateGrade($percentage),
            ]);

            $result->items()->delete();

            foreach ($validated['subjects'] as $subject) {

                $subjectTotal = (float) $subject['total_marks'];
                $subjectObtained = (float) $subject['obtained_marks'];

                $subjectPercentage = $subjectTotal > 0
                    ? ($subjectObtained / $subjectTotal) * 100
                    : 0;

                ResultItem::create([
                    'result_id' => $result->id,
                    'subject_id' => $subject['subject_id'],
                    'total_marks' => $subjectTotal,
                    'obtained_marks' => $subjectObtained,
                    'percentage' => round($subjectPercentage, 2),
                    'grade' => $this->calculateGrade(
                        $subjectPercentage
                    ),
                ]);
            }
        });

        return redirect()
            ->route('results.index')
            ->with('success', 'Result updated successfully.');
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()
            ->route('results.index')
            ->with('success', 'Result deleted successfully.');
    }

    private function calculateGrade(float $percentage): string
    {
        if ($percentage >= 80) {
            return 'A+';
        }

        if ($percentage >= 70) {
            return 'A';
        }

        if ($percentage >= 60) {
            return 'B';
        }

        if ($percentage >= 50) {
            return 'C';
        }

        if ($percentage >= 40) {
            return 'D';
        }

        return 'F';
    }
}