<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Start chart users new
        $Charts_today_users = User::whereDate('created_at', today())->count();
        $Charts_yesterday_users = User::whereDate('created_at', today()->subDays(2))->count();
        $Charts_users_3_days_ago = User::whereDate('created_at', today()->subDays(3))->count();
        $Charts_users_4_days_ago = User::whereDate('created_at', today()->subDays(4))->count();
        $Charts_users_5_days_ago = User::whereDate('created_at', today()->subDays(5))->count();
        $Charts_users_6_days_ago = User::whereDate('created_at', today()->subDays(6))->count();
        $Charts_users_7_days_ago = User::whereDate('created_at', today()->subDays(7))->count();
        // End chart users new

        // Start chart users trashed
        $Charts_today_users_trashed = User::onlyTrashed()->whereDate('deleted_at', today())->count();
        $Charts_yesterday_users_trashed = User::onlyTrashed()->whereDate('deleted_at', today()->subDays(2))->count();
        $Charts_users_trashed_3_days_ago = User::onlyTrashed()->whereDate('deleted_at', today()->subDays(3))->count();
        $Charts_users_trashed_4_days_ago = User::onlyTrashed()->whereDate('deleted_at', today()->subDays(4))->count();
        $Charts_users_trashed_5_days_ago = User::onlyTrashed()->whereDate('deleted_at', today()->subDays(5))->count();
        $Charts_users_trashed_6_days_ago = User::onlyTrashed()->whereDate('deleted_at', today()->subDays(6))->count();
        $Charts_users_trashed_7_days_ago = User::onlyTrashed()->whereDate('deleted_at', today()->subDays(7))->count();
        // End chart users trashed


        // Start chart users block
        $Charts_today_users_block = User::status()->whereDate('updated_at', today())->count();
        $Charts_yesterday_users_block = User::status()->whereDate('updated_at', today()->subDays(2))->count();
        $Charts_users_block_3_days_ago = User::status()->whereDate('updated_at', today()->subDays(3))->count();
        $Charts_users_block_4_days_ago = User::status()->whereDate('updated_at', today()->subDays(4))->count();
        $Charts_users_block_5_days_ago = User::status()->whereDate('updated_at', today()->subDays(5))->count();
        $Charts_users_block_6_days_ago = User::status()->whereDate('updated_at', today()->subDays(6))->count();
        $Charts_users_block_7_days_ago = User::status()->whereDate('updated_at', today()->subDays(7))->count();
        // End chart users block

        return view('admin.home',
            compact('Charts_today_users','Charts_yesterday_users','Charts_users_3_days_ago',
                'Charts_users_4_days_ago','Charts_users_4_days_ago','Charts_users_5_days_ago',
                'Charts_users_6_days_ago','Charts_users_7_days_ago',
                //start var charts users block
                'Charts_today_users_block','Charts_yesterday_users_block','Charts_users_block_3_days_ago',
                'Charts_users_block_4_days_ago','Charts_users_block_5_days_ago','Charts_users_block_6_days_ago','Charts_users_block_7_days_ago',
                //end var charts users block
                //start var charts users trashed
                'Charts_today_users_trashed','Charts_yesterday_users_trashed','Charts_users_trashed_3_days_ago',
                'Charts_users_trashed_4_days_ago','Charts_users_trashed_5_days_ago','Charts_users_trashed_6_days_ago','Charts_users_trashed_7_days_ago'
                //end var charts users trashed
            ));
    }
}
