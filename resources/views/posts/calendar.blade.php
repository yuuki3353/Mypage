<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>三者面談ページ</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="./css/index.blade.css">
        <link href="{{asset('/css/calendar.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS only -->
        <link href="https:cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <body>
                <center>
                    <div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link " href='/posts/index'>ホーム</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href='/posts/school'>学校連絡</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='/posts/guardian'>{{Auth::user()->name}}様宛て連絡</a>
                            </li>
                             @if(Auth::user()->id ==1)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='/posts/create'>追加・編集</a>
                            </li>
                            @else
                            @endif
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='/posts/calendar'>三者面談[予約]</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" style="text-aling: center;,text-left-">予約</div>
                        <div class="card-body">
                            <div class="text-wrap">
                                <ul class="text_child">
                                    <li>
                                        ※以下の手順に沿って予約して下さい
                                    </li>
                                    <li>
                                        ①カレンダー右上の[Week]を選択して下さい。
                                    </li>
                                    <li>
                                        ②時間帯を選択して下さい。
                                    </li>
                                    <li>
                                        ③学年・組・氏名の順番に記入して下さい。
                                    </li>
                                    <li>
                                        ※[list]より予約確認が可能です
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div id='calendar' class=" mt-5 w-75 p-3" style="background:url('/img/06.jpg'); background-size: cover; background-repeat: no-repeat; " ></div>
                        
                    </form>
                </center>
            </body>
@endsection