<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Guardian;
use App\Category;
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
        
        public function edit(Mail $mail)
    {
            return view('posts/edit')->with(['mail' => $mail]);
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
