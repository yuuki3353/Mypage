<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Guardian;
use App\Category;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Http\Requests\MailSaveRequest;
use App\Http\Controllers\mailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class mailController extends Controller
{
        public function index(Mail $mail, Guardian $guardian)//index.blaad
    {
            $parent="guardians";
            
        
            return view('posts/index')->with([
                'schoolMails' => $mail->mailsForSchool(),
                'parentMails' => $mail->mailsForParent(),
                'guardians' =>$guardian->get()
                ]);
    }
    
        public function show(Mail $mail)
    {
            return view('posts/show')->with(['mail' => $mail]);
    }

        public function create(Category $category,Mail $mail, Guardian $guardian)
    {
             $name=\Route::currentRouteName();
            return view('posts/create')->with(['categories' =>$category->get(),"name"=>$name , 'mail'=>$mail->get(), 'guardian'=>$guardian->get()]);
    }
    
        public function store(MailSaveRequest $request, Mail $mail, Guardian $guardian, Category $category)
    {
            $mail->fill($request->input('mail'))->save();
            return redirect('/');
    }
    
        public function school(Mail $mail)
    {
            return view('posts/school')->with(['mail'=> $mail->get()]);    
    }
    
        public function guardian(Mail $mail)
    {
            return view('posts/guardian')->with(['mail'=> $mail->get()]);
    }
        public function calendar(Mail $mail)
    {
            return view('posts/calendar')->with(['mail'=> $mail->get()]);
    }
        
        public function edit(Mail $mail)
    {
            return view('posts/edit')->with(['mail' => $mail]);
    }
    
        public function scheduleAdd(Request $request)
    {
        // バリデーション
        $request->validate
        ([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'event_name' => 'required|max:32',
        ]);

        // 登録処理
       $schedule = new Schedule;
       //
       $schedule->start_date = date('Y-m-d', $request->input('start_date')/ 1000);
       $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
       $schedule->event_name =$request->input('event_name');
       $schedule->save();
       
       return;
    }
        public function scheduleGet(Request $request)
    {
            $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
            ]);
            
             $start_date =date('Y-m-d' , $request->input('start_date') / 1000);
             $end_date =date('Y-m-d' ,$request->input('end_date') /1000);
            
        
            return Schedule::query()
            ->select(
            'start_date as start',
            'end_date as end',
            'event_name as title'
            )
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }
    
        public function update(MailRequest $request, Mail $mail)
    {
            $input_mail = $request['mail'];
            $mail->fill($input_mail)->save();
        
            return redirect('/mails/' . $mail->id);
    }
 
        public function delete(Mail $mail)
    {
            $mail->delete();
            return redirect('/');
    }    
    
}
/**
 * Post一覧を表示する
 * 
 * @param Post Postモデル
 * @return array Postモデルリスト
 */
