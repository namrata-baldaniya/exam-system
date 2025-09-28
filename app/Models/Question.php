<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['exam_id', 'question_text', 'option1', 'option2', 'option3', 'option4', 'correct_option', 'category'];
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
