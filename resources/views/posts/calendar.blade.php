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
                            <a class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                              <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                            </svg>
                            </a>
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