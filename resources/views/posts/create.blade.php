<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
        <body>
            <h1>追加</h1>
            <form action="/posts" method="POST">
                @csrf
                <div class="category">
                <h3>カテゴリー</h3>
                    <select name="mail[category_id]">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="title">
                        <h2>タイトル</h2>
                        <input type="text" name="mail[title]" placeholder="タイトル" value="{{ old('mail.title') }}"/>
                        <p class="title__error" style="color:red">{{ $errors->first('mail.title') }}</p>
                        <input name="mail[user_id]" type="hidden" value={{Auth::id()}} />
                        <input type="datetime-local">
                    </div>
                        <div class="body">
                        <h3>内容</h3>
                        <textarea name="mail[body]" placeholder="今日も1日お疲れさまでした。">{{ old('mail.body') }}</textarea>
                        <p class="body__error" style="color:red">{{ $errors->first('mail.body') }}</p>
                        </div>
                        <input type="submit" value="保存"/>
                    <div class="back">[<a href="/">back</a>]</div>
            </form>
        </body>
</html>
@endsection