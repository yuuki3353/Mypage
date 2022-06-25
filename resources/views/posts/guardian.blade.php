<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>保護者連絡ページ</title>
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
                            <a class="nav-link"href='/posts/index'>ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/school'>学校連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href='/posts/guardian'>保護者連絡</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/create'>追加・編集</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
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
               
                {{Auth::user()->name}}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" style="width: 35rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">保護者連絡</h5>
                                <div class='posts'>
                                    [<a href='/posts/create'>保護者連絡追加</a>] 
                                    @foreach($mail as $parentMail)
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
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>