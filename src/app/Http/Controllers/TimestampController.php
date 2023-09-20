<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TimestampController;
use App\Models\Timestamp;

class TimestampController extends Controller
{
    public function mypage()
    {
        return view('mypage');
    }

    public function logTimestamp(Request $request, $timestampData)
    {
        $user = auth()->user();
        $action = $request->input('action');
        $timestamp = now();

        $timestampData['user_id'] = $user->id;
        $timestampData['name'] = $user->name;
        $timestampData["{$action}_time"] = $timestamp;

        DB::table('timestamps')->insert($timestampData);

        return back()->with('success', 'Timestamp logged successfully.');
    }

    public function manage($date = null)
    {
        // If no date is provided, use the current date as the default
        $date = $date ?? now()->format('Y-m-d');

        // Calculate previous and next dates
        $selectedDate = \Carbon\Carbon::parse($date);
        $previousDate = $selectedDate->subDay()->format('Y-m-d');
        $nextDate = $selectedDate->addDay()->format('Y-m-d');

        // Fetch data for the selected date and pass it to the view
        $timestampData = Timestamp::whereDate('work_start_time', $date)->get();

        return view('manage', compact('timestampData', 'date', 'previousDate', 'nextDate'));
    }

    public function manageByDate($date)
    {
        // Calculate previous and next dates
        $selectedDate = \Carbon\Carbon::parse($date);
        $previousDate = $selectedDate->subDay()->format('Y-m-d');
        $nextDate = $selectedDate->addDay()->format('Y-m-d');

        // Fetch data for the selected date and pass it to the view
        $timestampData = Timestamp::whereDate('work_start_time', $date)->get();

        return view('manage', compact('timestampData', 'date', 'previousDate', 'nextDate'));
    }
}
