<?php

namespace App\Http\Controllers;

use App\Events\MakeOrder\MakeOrderEvent;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{

    public  function  getOrder(){

        $order=Order::get();
        return response($order,'200');
    }

    public  function  store(Request $request){
       $data=$request->all();
       Log::info('kkkk');
//       $order=new Order();
//       $order->fill($data);
//       $order->save();
//       $data=$request->toArray();
       event(new MakeOrderEvent($data));
//       return response($data,'200');
    }
}
