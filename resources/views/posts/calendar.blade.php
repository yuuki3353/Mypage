<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>三者面談ページ</title>
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
                                <a class="nav-link " href='/posts/index'>ホーム</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href='/posts/school'>学校連絡</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='/posts/guardian'>保護者連絡</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='/posts/create'>追加・編集</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='/posts/calendar'>三者面談[予約]</a>
                            </li>
                            <li>
                                <i class="bi bi-envelope-check-fill"></i>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="card">
                        <div class="card-header" style="text-aling: center;">予約</div>
                        <div class="card-body">
                            <ul>
                                <li class="text-senter">※カレンダーより、ご希望の予定日をお選び下さい。</li>
                                <li class="text-senter">※予約は次回予約のみお取り頂けます。</li>
                                <li class="text-senter">※時間を指定される場合、Weekボタンから予約が可能です。</li>
                                <li class="text-senter">※listにて予約確認が可能です。</li>
                            </ul>
                        </div>
                    </div>
                        <div>
                            <div id='calendar' class="w-75 p-3" style="background:url('/img/06.jpg');　background-size: cover;" ></div>
                        </div>
                        
                        
                    </form>                        
                </center>
            </body>
@endsection