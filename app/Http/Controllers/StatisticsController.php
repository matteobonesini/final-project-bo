<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Developer;
use App\Models\User;
use Faker\Core\Number;
// Facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index(){
        $devId = User::findOrFail(Auth::id())->developer->user_id;
        $developer = Developer::where('user_id', '=', $devId)->with('messages', 'reviews', 'votes')->first();

        $messagesDataChart = $this->messages($devId);
        $reviewsDataChart = $this->reviews($devId);

        // SELECT COUNT(created_at) as data, YEAR(created_at) as year, MONTH(created_at) as month FROM `messages` WHERE developer_id = 1 AND TIMESTAMPDIFF(DAY,created_at, NOW()) < 365 GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY YEAR(created_at) ASC, MONTH(created_at) ASC; 
        
        return view ('dashboard.statistics', compact('developer', 'messagesDataChart', 'reviewsDataChart'));
    }

    public function messages($id) {

        $days = 365 - (int)date('t') + (int)date('j');
        
        $messagesData = DB::table('messages')
                        ->selectRaw('COUNT(created_at) as data, YEAR(created_at) as year, MONTH(created_at) as month')
                        ->whereRaw('developer_id = ' . $id . ' AND TIMESTAMPDIFF(DAY,created_at, NOW()) < ' . $days)
                        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                        ->orderByRaw('YEAR(created_at) ASC, MONTH(created_at) ASC')
                        ->get();

        $stringMonth = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach($messagesData as $message) {
            $data[$message->month - 1] = $message->data;
        }

        $month = (int)date('m');
        $rest = $month - 12;

        if($month != 12) {
            $stringMonth = array_merge(array_slice($stringMonth, $rest), array_slice($stringMonth, 0, $month)); 
            $data = array_merge(array_slice($data, $rest), array_slice($data, 0, $month)); 
        }

        $messagesDataChart = [
            'labels' => $stringMonth,
            'data' => $data
        ];

        return $messagesDataChart;
    }

    public function reviews($id) {

        $days = 365 - (int)date('t') + (int)date('j');
        
        $reviewsData = DB::table('reviews')
                        ->selectRaw('COUNT(created_at) as data, YEAR(created_at) as year, MONTH(created_at) as month')
                        ->whereRaw('developer_id = ' . $id . ' AND TIMESTAMPDIFF(DAY,created_at, NOW()) < ' . $days)
                        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
                        ->orderByRaw('YEAR(created_at) ASC, MONTH(created_at) ASC')
                        ->get();

        $stringMonth = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        foreach($reviewsData as $review) {
            $data[$review->month - 1] = $review->data;
        }

        $month = (int)date('m');
        $rest = $month - 12;

        if($month != 12) {
            $stringMonth = array_merge(array_slice($stringMonth, $rest), array_slice($stringMonth, 0, $month)); 
            $data = array_merge(array_slice($data, $rest), array_slice($data, 0, $month)); 
        }

        $reviewsDataChart = [
            'labels' => $stringMonth,
            'data' => $data
        ];

        return $reviewsDataChart;
    }

}
