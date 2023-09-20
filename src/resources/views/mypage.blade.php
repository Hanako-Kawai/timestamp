@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
@endsection

@section('header')
<header class="site-header">
    <div class="wrapper site-header__wrapper">
        <a href="#" class="brand">Atte</a>
        <nav class="nav">
        <ul class="nav__wrapper">
            <li class="nav__item"><a href="#">ホーム</a></li>
            <li class="nav__item"><a href="#">日付一覧</a></li>
            <li class="nav__item"><a href="#">ログアウト</a></li>
        </ul>
        </nav>
    </div>
</header>
@endsection

@section('content')
<div class="message">
    <p>{{ auth()->user()->name }}さんお疲れ様です！</p>
</div>

<div class="table__group">
    <table class="table__inner">
        <tr class="table__row">
            <td class="stamp__box">
                <form method="post" action="{{ route('log_timestamp') }}">
                    @csrf
                    <input type="hidden" name="action" value="work_start">
                    <button type="submit" id="work_start_button">勤務開始</button>
                </form>
            </td>
            <td class="stamp__box">
                <form method="post" action="{{ route('log_timestamp') }}">
                    @csrf
                    <input type="hidden" name="action" value="work_end">
                    <button type="submit" id="work_end_button" disabled>勤務終了</button>
                </form>
            </td>
        </tr>
        <tr class="table__row">
            <td class="stamp__box">
                <form method="post" action="{{ route('log_timestamp') }}">
                    @csrf
                    <input type="hidden" name="action" value="break_start">
                    <button type="submit" id="break_start_button" disabled>休憩開始</button>
                </form>
            </td>
            <td class="stamp__box">
                <form method="post" action="{{ route('log_timestamp') }}">
                    @csrf
                    <input type="hidden" name="action" value="break_end">
                    <button type="submit" id="break_end_button" disabled>休憩終了</button>
                </form>
            </td>
        </tr>
    </table>
</div>

<script>
$(document).ready(function() {
    let breakStarted = false; // Track whether a break is in progress
    let workStarted = false; // Track whether work has started

    // Function to check for day change
    function checkDayChange() {
        const currentDay = new Date().getDate(); // Get the current day
        const storageDay = localStorage.getItem('workDay'); // Get the stored day

        if (currentDay != storageDay) {
            // Day has changed, switch to 勤務開始
            $('#work_start_button').prop('disabled', false);
            $('#work_end_button, #break_start_button, #break_end_button').prop('disabled', true);
            breakStarted = false; // Reset break status
            workStarted = false; // Reset work status
            // Store the current day
            localStorage.setItem('workDay', currentDay);
        }
    }

    // Initially check for day change
    checkDayChange();

    // Function to update button states
    function updateButtonStates() {
        $('#work_start_button').prop('disabled', workStarted);
        $('#work_end_button').prop('disabled', !workStarted);
        $('#break_start_button').prop('disabled', !workStarted || breakStarted);
        $('#break_end_button').prop('disabled', !breakStarted);
    }

    // Initially, update button states based on initial state
    updateButtonStates();

    // Event handlers for button clicks

    $('#work_start_button').click(function() {
        if (!workStarted) {
            workStarted = true;
            updateButtonStates();
        }
    });

    $('#work_end_button').click(function() {
        if (workStarted) {
            workStarted = false;
            breakStarted = false;
            updateButtonStates();
        }
    });

    $('#break_start_button').click(function() {
        if (workStarted && !breakStarted) {
            breakStarted = true;
            updateButtonStates();
        }
    });

    $('#break_end_button').click(function() {
        if (breakStarted) {
            breakStarted = false;
            updateButtonStates();
        }
    });

    // Initially disable 勤務終了 and 休憩開始
    $('#work_end_button, #break_start_button').prop('disabled', true);
});
</script>


@endsection