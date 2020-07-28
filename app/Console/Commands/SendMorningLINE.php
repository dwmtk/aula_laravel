<?php

namespace App\Console\Commands;
use App\T_Orders;

use Illuminate\Console\Command;

define('LINE_API_URL','https://notify-api.line.me/api/notify');
define('LINE_API_TOKEN','vQ70YJg4wD1mhUZ6tXBgHWf9MDtJRyV5RlyvSjsMVlF');

class SendMorningLINE extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendMorningLINE:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification about reservation on today daily';

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
        $count = T_Orders::where('order_date', date("Ymd"))
        ->where('status', '2')
        ->count();

        $message = '本日の予約件数は、'. $count . ' 件です。[https://aula.work/manage]';

        $data = http_build_query( [ 'message' => $message ], '', '&');

        $options = [
            'http'=> [
                'method'=>'POST',
                'header'=>'Authorization: Bearer ' . LINE_API_TOKEN . "\r\n"
                        . "Content-Type: application/x-www-form-urlencoded\r\n"
                        . 'Content-Length: ' . strlen($data)  . "\r\n" ,
                'content' => $data,
                ]
            ];
    
        $context = stream_context_create($options);
        $resultJson = file_get_contents(LINE_API_URL, false, $context);
        $resultArray = json_decode($resultJson, true);
        if($resultArray['status'] != 200)  {
            return false;
        }
        return true;
    }
}
