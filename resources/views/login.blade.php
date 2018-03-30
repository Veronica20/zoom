@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="parentDiv Login">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
         <form action="{{ route('login') }}" method="POST">
             {{ csrf_field() }}
            <h1> <span class="login_title">մուտք</span> </h1>
            <div class="emailDiv">
                <i class="fa fa-envelope-o login_email_icon"></i>
                <input type="text" placeholder="էլ հասցե" class="JustInput" name="email">
            </div>
            <div class="emailDiv">
                <i class="fa fa-lock login_email_icon"></i>
                <input type="password" placeholder="Գաղտնաբառ" class="JustInput" name="password">
            </div>
            <div>
                <button type="submit" class="continue"> մուտք </button>
            </div>
            <a href="{{ url('/registration') }}">
                Գրանցվել
            </a>
         </form>
    </div>
@endsection
