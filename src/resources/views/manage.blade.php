@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
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
<div class="manage-header">
    <div class="date-picker">
        <!-- Display the previous date -->
        <a href="{{ route('manage.by.date', ['date' => $previousDate]) }}" class="date-picker__arrow">&larr;</a>
        <!-- Display the selected date -->
        <span class="selected-date">{{ $date }}</span>
        <!-- Display the next date -->
        <a href="{{ route('manage.by.date', ['date' => $nextDate]) }}" class="date-picker__arrow">&rarr;</a>
    </div>
</div>

<div class="manage-table">
    <table class="manage-table__inner">
        <tr class="manage-table__row">
            <th class="manage-table__header">名前</th>
            <th class="manage-table__header">勤務開始</th>
            <th class="manage-table__header">勤務終了</th>
            <th class="manage-table__header">休憩時間</th>
            <th class="manage-table__header">勤務時間</th>
        </tr>

        @foreach ($timestampData as $timestamp)
        <tr class="manage-table__row">
            <td class="manage-table__item">
                {{ $timestamp->name }}
            </td>
            <td class="manage-table__item">
                {{ $timestamp->work_start_time }}
            </td>
            <td class="manage-table__item">
                {{ $timestamp->work_end_time }}
            </td>
            <td class="manage-table__item">
                {{ $timestamp->break_duration }}
            </td>
            <td class="manage-table__item">
                {{ $timestamp->work_hour }}
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection
