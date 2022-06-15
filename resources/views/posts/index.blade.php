<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="./css/index.blade.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
        <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <body>
            <center>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href='/posts/school'>学校連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">保護者連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/create'>追加・編集</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">三者面談[予約]</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">問い合わせ</a>   
                        </li>
                    </ul>
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
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
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
                                                <p class='body'>{{ $parentMail->body }}</p>
                                            </div>
                                         </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </center>
        </body>
</html>
@endsection