<?php

namespace App\Http\Controllers;
use App\Models\Statistics; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function topUsers()
    {
        $topUsers = Statistics::select('user_id', 'task_count')
        ->with('user') // Load the user relationship to get user detail
        ->groupBy('user_id')
        ->orderByRaw('MAX(task_count) DESC')
        ->take(10)
        ->get();        

        return view("statistics.topUsers", compact('topUsers'));
    }
    
}
