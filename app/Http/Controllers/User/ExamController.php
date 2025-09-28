<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamHistory;
use App\Models\ExamResult;
use App\Models\Result;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::where('start_time', '<=', now())
            ->where('end_time', '>=', now())
            ->get();
        return view('user.exams.index', compact('exams'));
    }



    public function show(Exam $exam)
    {
        $alreadyTaken = Result::where('user_id', auth()->id())
            ->where('exam_id', $exam->id)
            ->exists();

        if ($alreadyTaken) {
            return redirect()->route('user.exams.index')
                ->with('error', 'You have already attempted this exam.');
        }

        $now = now();
        if (($exam->start_time && $now->lt($exam->start_time)) ||
            ($exam->end_time && $now->gt($exam->end_time))
        ) {
            return redirect()->route('user.exams.index')
                ->with('error', 'This exam is not available at this time.');
        }

        $questions = $exam->questions;
        return view('user.exams.show', compact('exam', 'questions', 'alreadyTaken'));
    }
    public function submit(Request $request, Exam $exam)
    {
        $answers = $request->input('answers', []);
        $questions = $exam->questions;
        $score = 0;

        $userId = auth()->id();
        if (Result::where('user_id', $userId)->where('exam_id', $exam->id)->exists()) {
            return redirect()->route('user.exams.index')
                ->with('error', 'You have already taken this exam.');
        }
        foreach ($questions as $q) {


            if (isset($answers[$q->id]) && 'option' . $answers[$q->id] === $q->correct_option) {
                $score++;
            }
        }

        $totalQuestions = $questions->count();
        $passed = $score >= ($totalQuestions * ($exam->passing_percentage / 100));
        Result::create([
            'user_id' => auth()->id(),
            'exam_id' => $exam->id,
            'score' => $score,
            'total_marks' => $totalQuestions,
            'passed' => $passed
        ]);

        return redirect()->route('user.results')->with('success', 'Exam submitted successfully!');
    }

    public function results()
    {
        // $results = ExamResult::where('user_id', auth()->id())->with('exam')->get();
        // return view('user.results.index', compact('results'));
        $userId = auth()->id();

        $exams = Exam::all();

        $results = Result::where('user_id', $userId)->get()->keyBy('exam_id');

        return view('user.results.index', compact('exams', 'results'));
    }
}
