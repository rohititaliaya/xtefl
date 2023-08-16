<?php

use App\Models\Transaction;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

if (!function_exists('has_active_plan')) {
    function has_active_plan($index = false)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $transaction = Transaction::where('user_id', $user_id)->orderBy('created_at', 'desc')->first();
            if ($transaction) {       
                if(strtotime($transaction->expiry_date)>strtotime(date('Y-m-d H:i:s'))){
                    return true;
                } 
                return false;
            }
        }
        return false;
    }
}

if (!function_exists('get_plan')) {
    function get_plan($index = false)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $transaction = Transaction::where('user_id', $user_id)->orderBy('created_at', 'desc')->first();
            if ($transaction) {
                
                $plan = Plan::find($transaction->plan_id);
                return $plan;
            }

        }
        return 'No plan Active';
    }
}