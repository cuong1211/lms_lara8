<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use App\Models\CorrectAnswer;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class QuizController extends Controller
{
    public function index($course_id)
    {
        return view('pages.backend.quiz.main',compact('course_id'));
    }
    public function show($course_id,$id){

        switch ($id) {
            case 'get-list':
                $quiz = quiz::query()->where('course_id',$course_id);
                return Datatables::of($quiz)->make(true);
                break;
            default:
                break;
        }
    }
    public function detail($course_id,$id) {
        $quiz = Quiz::find($id);
        $questions = Question::query()->where('quiz_id',$id)->get();
        $answers = Answer::query()->where('question_id',$id)->get();
        return view('pages.backend.quiz.show',compact('quiz','questions','answers'));

    }

    public function result(Request $request) {

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
        return view('pages.backend.quiz.result', compact('data','correct_answers_array_filtered', 'answers_array', 'correct_answers_count', 'question_count'));

    }


    public function store(Request $request)
    {
        //Get Request Data
        $data = $request->all();

        //Create Quiz instance
        $quiz = new Quiz;
        $quiz->user_id = Auth::user()->id;
        $quiz->course_id = $request->course_id;
        $quiz->quiz = $data['quiz-name'];
        $quiz->save();
        //Create Question Instance
        foreach ($data['question'] as $question_key => $question) {
            $question_instance = new Question;
            $question_instance->quiz_id = $quiz->id;
            $question_instance->question = $question['question-text'];
            $question_instance->save();
            //Create Answer Instance
            foreach ($question['answers'] as $answer_key => $answer ) {
                if($answer_key != "is_correct") {
                    $answer_instance = new Answer;
                    $answer_instance->question_id = $question_instance->id;
                    $answer_instance->answer = $answer;
                    $answer_instance->save();
                }
                if($answer_key == 'is_correct'){
                    //Create CorrectAnswer instance
                    $correct_answer = CorrectAnswer::create(['question_id' => $question_instance->id, 'answer_id' => $answer_instance->id ]);
                }
            }
        }
        if($quiz){
            return response()->json(
                [
                    'type' => 'success',
                    'title' => 'success',
                    'content' => 'Thêm thành công'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' => 'error',
                    'title' => 'error',
                    'content' => 'Thêm thất bại'
                ]
            );
        };
    }
}

