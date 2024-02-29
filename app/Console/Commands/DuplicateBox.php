<?php

namespace App\Console\Commands;

use App\Mail\TaskCompleted;
use App\Models\BoxInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DuplicateBox extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'box:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Double the amount of boxes';

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
     * @return int
     */
    public function handle()
    {
        $colors = ['#FF0000', '#FFFF00', '#00FF00', '#0000FF', '#FFC0CB', '#808080'];
        $box_col = BoxInfo::latest()->first('col_number');
        if (!isset($box_col->is_read)) {
            if ($box_col) {
                $col = $box_col->col_number + 1;
                $itration = pow(2, $col - 1);
            } else {
                $itration = 1;
                $col = 1;
            }
            if ($col < 6) {
                for ($i = 1; $i <= $itration; $i++) {
                    $box_info = new BoxInfo();
                    $box_info->color = $colors[array_rand($colors)];
                    $box_info->col_number = $col;
                    $box_info->is_read = 0;
                    $box_info->save();
                }
            } else {
                BoxInfo::query()->update(['is_read' => 1]);
                $fullName = 'Muhammad Umer Akram';
                $email = 'vonoga3648@aersm.com';
                Mail::to($email)->send(new TaskCompleted($fullName));
            }
        }
    }
}
