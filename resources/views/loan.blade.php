@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="parentDiv loanMain">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif

        <form action="{{ route('loan') }}" method="POST">
            {{ csrf_field() }}
            <div>
                <label >Արժույթ </label>
                <div class="currency_radio">
                    <div class="radio">
                        <label><input type="radio" name="AMD"> AMD</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="USA">USA</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="EUR">EUR</label>
                    </div>
                    <input name="currency" type="hidden">
                </div>
            </div>
            <div>
                <label for="money">Ւրքան գումար է ձեզ անհրաժեշտ</label>
                <input id="money" name="money" type="number" placeholder="գումարի չափը" class="JustInput" >
            </div>

            <div>
                <label for="county">Որտեղ եք ցանկանում ստանալ վարկը</label>
                <select class="SelectBox" id="county" name="county">
                    <option value=""> Մարզ *</option>
                    @foreach($county as $val)
                        <option value="{{$val}}">{{$val}}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="continue"> Շարունակել</button>
        </form>
    </div>

@endsection
