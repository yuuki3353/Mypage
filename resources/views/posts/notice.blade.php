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
        <link href="stylesheet" href="./css/index.css">
        
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
                        <li>
                            <a class="nav-link" href='/posts/notice'><i class="bi bi-envelope-check-fill"></i></a>
                        </li>
                    </ul>
                </div>
                            