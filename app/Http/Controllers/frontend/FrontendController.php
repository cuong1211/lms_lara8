<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Unit;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use App\Models\CorrectAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function getCourse(){;
        $course = Course::all();
        return view('pages.frontend.main',compact('course'));
    }
    public function getLesson($id){
        $unit = Unit::query()->where('course_id',$id)->get();
        $course = Course::find($id);
        return view('pages.frontend.lesson',compact('unit','course'));
    }
    public function getUnit($course_id,$id){
        $unit = Unit::query()->with('quiz')->find($id);
        $course = Course::find($course_id);
        return view('pages.frontend.unit',compact('unit','course'));

    }
    public function showQuiz($course_id,$unit_id,$id) {
        $unit = Unit::query()->where('id',$unit_id)->first();
       
        $quiz = Quiz::find($id);
     
        $questions = Question::query()->where('quiz_id',$id)->with('answers')->get();
        return view('pages.frontend.quiz',compact('quiz','questions','unit'));
    }
    public function showResult($course_id,$unit_id,$id, Request $request) {
        $data = $request->all();
        $answers_array = [];
        $correct_answers_array = [];
        $correct_answers_array_filtered = [];
        $question_count = 0;
        foreach ($data as $key => $datum) {
            if($key != '_token' && $key != 'invisible') {
                $answers_array[$key] = $datum;
                $correct_answers_array[] =  json_decode(DB::table('correct_answers')->where('question_id', $key)->get(), true);
                $question_count++;
            }
        }
        foreach ($correct_answers_array as $correct_answer) {
            $correct_answers_array_filtered[$correct_answer[0]['question_id']] = $correct_answer[0]['answer_id'];
        }
        $correct_answers_count = count(array_intersect($answers_array, $correct_answers_array_filtered));
        $point_per_question = 10/$question_count;
        $point = round(($point_per_question * $correct_answers_count),1);
        return view('pages.frontend.result', compact('data','correct_answers_array_filtered', 'answers_array', 'correct_answers_count', 'question_count', 'point'));

    }

}
