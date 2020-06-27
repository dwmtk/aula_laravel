<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\M_Calendars;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class GoogleCalendarUpdateBat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calendar:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Google Calendar Update midnight';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = date("Ymd",strtotime("+2 week"));
        
        $event_description = $this->create_calendar_description($date);
        $event_summary = $this->create_calendar_summary($date);

        $dt = new Carbon($date); // 日時形式に変更
        $dt2 = new Carbon($date); // 日時形式に変更
        $dt2->addDay();
        $events = Event::get($dt, $dt2); // 予約日のイベントを取得する

        if(count($events) != 0){
            // イベントが存在する場合
            $event = Event::find($events[0]->id);
            $event->summary = $event_summary; // タイトル
            $event->description = $event_description; // 説明文
            $event->save();
        } else {
            // イベントが存在しない場合
            $event = new Event;
            $event->summary = $event_summary;
            $event->startDate = $dt; // 終日
            $event->endDate = $dt2; // 終日
            $event->description = $event_description;
            $event->save();
        }
    }

    public function create_calendar_summary($date){

        $calendar = M_Calendars::where('calendar', $date)->first();

        $s = "○";
        if(($calendar->schedule1_max - $calendar->schedule1 == 0) and ($calendar->schedule2_max - $calendar->schedule2 == 0) and ($calendar->schedule3_max - $calendar->schedule3 == 0) /*and ($calendar->schedule4_max - $calendar->schedule4) */
            ){
            $s = "×";
        } elseif (
            (($calendar->schedule1_max - $calendar->schedule1 == 0) and ($calendar->schedule2_max - $calendar->schedule2 == 0)) 
            or
            (($calendar->schedule1_max - $calendar->schedule1 == 0) and ($calendar->schedule3_max - $calendar->schedule3 == 0))
            or
            (($calendar->schedule2_max - $calendar->schedule2 == 0) and ($calendar->schedule3_max - $calendar->schedule3 == 0))
            /*and ($calendar->schedule4_max - $calendar->schedule4) */
            ){
            $s = "△";
        } else {
            $s = "○";
        }
        return $s;
    }

    public function create_calendar_description($date){

        $calendar = M_Calendars::where('calendar', $date)->first();
        
        $s1 = '○';
        $s2 = '○';
        $s3 = '○';
        // $s4 = '○';

        // シフト1
        if($calendar->schedule1_max - $calendar->schedule1 == 0){
            $s1 = "×";
        } elseif($calendar->schedule1_max - $calendar->schedule1 == 1){
            $s1 = "△";
        } else {
            $s1 = "○";
        }
        // シフト2
        if($calendar->schedule2_max - $calendar->schedule2 == 0){
            $s2 = "×";
        } elseif($calendar->schedule2_max - $calendar->schedule2 == 1){
            $s2 = "△";
        } else {
            $s2 = "○";
        }
        // シフト3
        if($calendar->schedule3_max - $calendar->schedule3 == 0){
            $s3 = "×";
        } elseif($calendar->schedule3_max - $calendar->schedule3 == 1){
            $s3 = "△";
        } else {
            $s3 = "○";
        }
        // シフト4
        // if($calendar->schedule4_max - $calendar->schedule4 == 0){
        //     $s4 = "×";
        // } elseif($calendar->schedule4_max - $calendar->schedule4 == 1){
        //     $s4 = "△";
        // } else {
        //     $s4 = "○";
        // }
        $event_description =
        "08:00～11:00：" . $s1 . "\r\n" .
        "11:00～14:00：" . $s2 . "\r\n" .
        "14:00～17:00：" . $s3;

        return $event_description;
        
    }
}
