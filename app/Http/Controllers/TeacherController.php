<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('answer')->get();
        $questions = $questions->shuffle();
        return view('student.questions',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.createquestion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->ans[$request->correct-1]);
        DB::beginTransaction();

        try {
            $question = new Question;
            $question->title = $request->question;
            $question->save();
        
            //Get last Id of inserted Question
            $lastId = $question->id;

            //Insert to Answers table 
            $answers = $request->ans;
            foreach($answers as $answer){
                $ans = new Answer;
                $ans->question_id = $lastId;
                $ans->answer = $answer;
                $ans->save();
                if($answer == $answers[$request->correct-1])
                    $lastAnsid = $ans->id;
            }

            DB::table('question_answer')->insert([
                'question_id' => $lastId,
                'answer_id' => $lastAnsid,
            ]);

            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect('/home');
        }

        return redirect('/teacher/questions/create')->with('success','New Question Added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function settime(){
        $student = User::find(\Auth::user()->id);
        return true;
    }
}
