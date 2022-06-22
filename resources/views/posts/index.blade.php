<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>HOOMページ</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="./css/index.blade.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
        <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <body>
            <footer class="footer">
            //<center>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href='/posts/index'>ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/school'>学校連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/guardian'>保護者連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/create'>追加・編集</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                        </li>
                    </ul>
                </div>
                            
                            
                <div class="card mb-3" style="max-width: 1000px;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ asset('/img/BG14a_80.jpg') }}" width="120" height="100">
                    </div>
                    <div class="col-md-8 w-75 ">
                      <div class="card-body">
                        <h5 class="card-title">○○小学校</h5>
                        <p class="card-text">学校の詳細及び内容</p>
                        <p class="card-text"><small class="text-muted">更新日時</small></p>
                      </div>
                    </div>
                  </div>
                </div>
               
                {{Auth::user()->name}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" style="width: 35rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">学校連絡</h5>
                                <div class='posts'>
                                    [<a href='/posts/create'>学校連絡追加</a>] 
                                    @foreach ($schoolMails as $schoolmail)
                                        <form action="/posts/{{ $schoolmail->id }}" id="form_{{ $schoolmail->id }}" method="mail" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                            <div class='post'>
                                                <h2 class='title'>{{ $schoolmail->title }}</h2>
                                                <a href="/mails/{{ $schoolmail->id }}">{{ $schoolmail->title}}> </a>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
            
                    <div class="col-sm-6">
                        <div class="card" style="width: 35rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">保護者連絡</h5>
                                <div class='posts'>
                                    [<a href='/posts/create'>保護者宛て連絡追加</a>]
                                    @foreach($parentMails as $parentMail)
                                        <form action="/posts/{{ $parentMail->id }}" id="form_{{ $parentMail->id }}" method="mail" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                            <div class='post'>
                                                <h2 class='title'>{{ $parentMail->title }}</h2>
                                                <a href="/mails/{{ $parentMail->id }}">{{ $parentMail->title}}> </a>
                                            </div>
                                         </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </footer>
            //</center>
        </body>
</html>
@endsection