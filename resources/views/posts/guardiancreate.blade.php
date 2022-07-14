<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>編集画面ページ</title>
    </head>
    <body>
        <h1>編集画面</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="guardian[title]" placeholder="タイトル" value="{{ old('guardian].title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('guardian.title') }}</p>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea name="guardian[body]" placeholder="今日も1日お疲れさまでした。">{{ old('guardina.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('guardian.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>
@endsection