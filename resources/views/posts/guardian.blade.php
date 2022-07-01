<!DOCTYPE html>
@extends('layouts.app')
        
@section('content')

        <body>
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link"href='/posts/index'>ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/school'>学校連絡</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href='/posts/guardian'>{{Auth::user()->name}}様宛て連絡絡</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/create'>追加・編集</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='/posts/calendar'>三者面談[予約]</a>
                    
                </ul>
            </div>
               
            <center>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card" style="width: 35rem;">
                            <img src="" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">保護者連絡</h5>
                                <div class='posts'>
                                    [<a href='/posts/create'>保護者連絡追加</a>] 
                                    @foreach($mail as $parentMail)
                                        <form action="/posts/{{ $parentMail->id }}" id="form_{{ $parentMail->id }}" method="post" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                            <div class='post'>
                                                <h2 class='title'>{{ $parentMail->title }}</h2>
                                                <a href="/mails/{{ $parentMail->id }}">{{ $parentMail->title}}> </a>
                                                <p class='body'>{{ $parentMail->body }}</p>
                                                <p>{{date('Y年m月d日', strtotime($parentMail->created_at))}}</p>
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
            <img src="..." class="rounded float-start" alt="...">
            <img src="..." class="rounded float-end" alt="...">
@endsection