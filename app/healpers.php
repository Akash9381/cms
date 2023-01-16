<?php

use App\Models\Buyer;
use App\Models\Landloard;
use App\Models\Seller;
use App\Models\Tenent;
use Carbon\Carbon;
use Request as RQ;

if(!function_exists('setActiveClass')){
    function setActiveClass($path){
        return RQ::is($path.'*')?'active':'';
    }
}

// $schedule = strtok($tenentprofile['schedule'],' ');
//             if($schedule==Carbon::now()->format('m/d/Y')){
//                 return "yes";
//             }else{
//                 return "no";
//             }
if(!function_exists('TenentCount')){
    function TenentCount(){
        $count = 0;
        $tenents = Tenent::where('status',0)->where('notification',0)->get();
        foreach($tenents as $tenent){
            $schedule = strtok($tenent['schedule'],' ');
            if($schedule==Carbon::now()->format('m/d/Y')){
                $count++;
            }else{
                 continue;
            }
        }
       return $count;
    }
}

if(!function_exists('BuyerCount')){
    function BuyerCount(){
        $count = 0;
        $buyers = Buyer::where('status',0)->where('notification',0)->get();
        foreach($buyers as $tenent){
            $schedule = strtok($tenent['schedule'],' ');
            if($schedule==Carbon::now()->format('m/d/Y')){
                $count++;
            }else{
                 continue;
            }
        }
        return $count;
    }
}

if(!function_exists('AllNotification')){
    function AllNotification(){
        $allnotification = TenentCount()+BuyerCount();
        return $allnotification;
    }
}

