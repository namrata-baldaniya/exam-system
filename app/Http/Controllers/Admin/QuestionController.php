<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('exam')->orderBy('id', 'desc')->paginate(5);
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::all();
        $categories = Category::all();
        return view('admin.questions.create', compact('exams', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $data = $request->validated();
        $data['correct_option'] = 'option' . $data['correct_option'];
        Question::create($data);

        return redirect()->route('admin.questions.index')->with('success', 'Question added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        $exams = Exam::all();
        $categories = Category::all();
        return view('admin.questions.show', compact('question', 'exams', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $exams = Exam::all();
        $categories = Category::all();
        return view('admin.questions.edit', compact('question', 'exams', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $data = $request->validated();
        $data['correct_option'] = 'option' . $data['correct_option'];
        $question->update($data);
        return redirect()->route('admin.questions.index')->with('success', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Question deleted!');
    }
}
