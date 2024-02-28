<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondTaskController extends Controller
{
   public function second_tast() {
    $my_array =['red','black','pink','green','blue'];
    shuffle($my_array);
    // dd($my_array);
    return view('backend_assignment_task.second.second_task',compact('my_array'));
   }
   public function shuffle_array() {
    $my_array =['red','black','pink','green','blue'];
    shuffle($my_array);
    return $my_array;
   }
   public function reshuffle_array() {
    $my_array =['red','black','pink','green','blue'];
    return $my_array;
   }
}
