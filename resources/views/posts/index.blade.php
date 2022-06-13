<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        {{Auth::user()->name}}
    
        <center>
        <h1>学校連絡</h1>
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
                        <p class='body'>{{ $schoolmail->body }}</p>
                 </form>
            </div>
            
            @endforeach
        
        <h1>保護者宛て連絡</h1>
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
                 </form>
            @endforeach
        
        </div>
        </center>
    </body>
</html>
@endsection