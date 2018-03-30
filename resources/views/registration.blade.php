@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="parentDiv">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form action="{{ route('registration') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="FormDiv">
                <div>
                    <label for="email"> </label>
                    <input id="email" type="email" name="email" class="JustInput" placeholder="էլ․ հասցե *"
                           value="{{ !is_null(old('email')) ? old('email') : '' }}"
                    >
                </div>
                <div>
                    <label for="confirm_email"> </label>
                    <input id="confirm_email" type="email" name="email_confirmation" class="JustInput"
                           placeholder="Կրկնել էլ․ հասցեն *"
                           value="{{ !is_null(old('email_confirmation')) ? old('email_confirmation') : '' }}">
                </div>
                <div>
                    <label for="password"> </label>
                    <input id="password" type="password" name="password" class="JustInput" placeholder="Գաղտնաբառ *">
                </div>
                <div>
                    <label for="confirm_password"> </label>
                    <input id="confirm_password" type="password" name="password_confirmation" class="JustInput" placeholder="Կրկնել Գաղտնաբառը *">
                </div>
                <div>
                   <span>Ներբեռնել Լուսանկար *</span>
                    <input id="image" type="file" name="image">
                </div>
            </div>
            <div>
                <button type="submit" class="continue"> Շարունակել </button>
            </div>
        </form>
    </div>
@endsection
