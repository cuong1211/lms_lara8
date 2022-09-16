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
use App\Models\class_user;
use App\Models\CorrectAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;
use App\Models\Zoom;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\ToArray;

class FrontendController extends Controller
{
    public function getCourse($user_id){;
        $class_course = [];
        $class_user = class_user::query()->where('user_id',$user_id)->get()->toarray();
        foreach ($class_user as $key=>$value){  
            $class = Classes::query()->where('id',$value['class_id'])->with('course')->get()->toArray(); 
            $class_course[] = $class[0];
        }
        // dd($class_course);
        return view('pages.frontend.main',compact('class_course','user_id'));
    }
    public function getLesson($user_id,$class_id,$id){
        $course = Course::find($id);
        $class_user = class_user::query()->where('user_id',$user_id)->with('classes')
            ->whereHas('classes', function (Builder $query) use ($id) {
                $query->where('course_id', $id);
            })->get()->toArray();
        $unit = Unit::query()->where('course_id',$id)->get();
        return view('pages.frontend.lesson',compact('unit','course','class_user','user_id','class_id'));
    }
    public function getUnit($user_id,$class_id,$course_id,$id){
        $unit = Unit::query()->where('id',$id)->first();
        // dd($unit);
        $teacher = Classes::query()->where('id',$class_id)->with('user')->first();
        $zoom_id  = $teacher->user->zoom_id;
        $zoom = Zoom::query()->where('id',$zoom_id)->first();
        return view('pages.frontend.unit',compact('unit','teacher','user_id','class_id','course_id','zoom'));

    }
    public function showQuiz($user_id,$class_id,$course_id,$unit_id,$id){
        $quiz = Quiz::find($id);
        $questions = Question::query()->where('quiz_id',$id)->with('answers')->get();
        return view('pages.frontend.quiz',compact('quiz','questions','unit_id','course_id','class_id','user_id'));
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
