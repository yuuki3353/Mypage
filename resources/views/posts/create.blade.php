<!DOCTYPE HTML>
@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
    <html>    
        <body>
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/index'>ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/school'>学校連絡</a>
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
                        <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                    </li>
                    <li>
                        <div class="nav-link">
                            <a id="open">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                                </svg>
                            </a>
                            <div id="mask" class="hidden"></div>
                            <section id="modal" class="hidden">
                                <p>{{Auth::user()->name}}様に新しいメールが届きました。<br>
                                
                                @foreach($mail as $parentMail)
                                <a href='/posts/school'>
                                    <form action="/posts/{{ $parentMail->id }}" id="form_{{ $parentMail->id }}" method="mail" style="display:inline">
                                        <div class='post'>
                                            <h2 class='title'>{{ $parentMail->title }}</h2>
                                            <a href="/mails/{{ $parentMail->id }}">{{ $parentMail->title}}> </a>
                                            <p>{{date('Y年m月d日', strtotime($parentMail->created_at))}}</p>
                                        </div>
                                    </form>
                                </a>
                                @endforeach</p>
                                <div id="close">
                                    閉じる
                                </div>
                            </section>
                        </div>
                    </li>
                </ul>
            </div>
            
            <center>
                <h2>追加</h2>
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
                        </div>
                            <div class="body">
                            <h3>内容</h3>
                            <textarea name="mail[body]" placeholder="今日も1日お疲れさまでした。">{{ old('mail.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('mail.body') }}</p>
                            </div>
                            <input type="submit" value="保存"/>
                        <div class="back">[<a href="/">back</a>]</div>
                </form>
            </center>
        </body>
    </html> 
        
    <script>
            'use strict';
        {
                 const open = document.getElementById('open');
                 const close = document.getElementById('close');
                 const modal = document.getElementById('modal');
                 const mask = document.getElementById('mask');
                
                open.addEventListener('click', function () {
                modal.classList.remove('hidden');
                mask.classList.remove('hidden');
            });
                close.addEventListener('click', function () {
                modal.classList.add('hidden');
                mask.classList.add('hidden');
            });
                mask.addEventListener('click', function () {
                modal.classList.add('hidden');
                mask.classList.add('hidden');
            });
        }
    </script>
        
@endsection