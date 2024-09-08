<?php

namespace App\Http\Controllers\Authenticated\Calendar\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\Admin\CalendarView;
use App\Calendars\Admin\CalendarSettingView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarsController extends Controller
{
    public function show()
    {
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.admin.calendar', compact('calendar'));
    }

    public function reserveDetail($date, $part)
    {
        $reservePersons = ReserveSettings::with('users')->where('setting_reserve', $date)->where('setting_part', $part)->get();

        return view('authenticated.calendar.admin.reserve_detail', compact('reservePersons', 'date', 'part'));
    }

    public function reserveSettings()
    {
        $calendar = new CalendarSettingView(time());
        return view('authenticated.calendar.admin.reserve_setting', compact('calendar'));
    }

    public function updateSettings(Request $request)
    {
        $reserveDays = $request->input('reserve_day');
        foreach ($reserveDays as $day => $parts) {
            foreach ($parts as $part => $frame) {
                ReserveSettings::updateOrCreate([
                    'setting_reserve' => $day,
                    'setting_part' => $part,
                ], [
                    'setting_reserve' => $day,
                    'setting_part' => $part,
                    'limit_users' => $frame,
                ]);
            }
        }
        return redirect()->route('calendar.admin.setting', ['user_id' => Auth::id()]);
    }

    // public function reserveCounts($date)
    // {
    //     // 1部、2部、3部それぞれの予約人数をカウント
    //     $onePartCount = ReserveSettings::where('setting_reserve', $date)
    //         ->where('setting_part', 1)
    //         ->withCount('users')
    //         ->first()?->users_count ?? 0;

    //     $twoPartCount = ReserveSettings::where('setting_reserve', $date)
    //         ->where('setting_part', 2)
    //         ->withCount('users')
    //         ->first()?->users_count ?? 0;

    //     $threePartCount = ReserveSettings::where('setting_reserve', $date)
    //         ->where('setting_part', 3)
    //         ->withCount('users')
    //         ->first()?->users_count ?? 0;

    //     // 結果を配列として返す
    //     return [
    //         'onePartCount' => $onePartCount,
    //         'twoPartCount' => $twoPartCount,
    //         'threePartCount' => $threePartCount,
    //     ];
    // }
}
