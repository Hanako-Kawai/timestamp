@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
<header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/login">
        Atte
        </a>
    </div>
</header>
@endsection

@section('content')
<div class="register__content">
    <form class="form" method="POST" action="{{ route('register.custom') }}">
        @csrf
        <div class="form__group">
            <div class="register__heading">
                <h2>会員登録</h2>
            </div>

            <div class="inputbox">
                <input type="text" name="name" id="name" placeholder="名前" required />
                <div class="form__error">
                    <!-- Validation errors for name -->
                </div>
                <input type="text" name="email" id="email" placeholder="メールアドレス" required />
                <div class="form__error">
                    <!-- Validation errors for email -->
                </div>
                <input type="password" name="password" id="password" minlength="8" placeholder="パスワード" required />
                <div class="form__error">
                    <!-- Validation errors for password -->
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" minlength="8" placeholder="確認用パスワード" required />
                <div class="form__error">
                    <!-- Validation errors for password confirmation -->
                </div>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">会員登録</button>
        </div>
    </form>
</div>

<div class="yes_account">
    <p>アカウントをお持ちの方はこちらから</p>
    <a href="{{ route('login') }}">ログイン</a>
</div>

@endsection