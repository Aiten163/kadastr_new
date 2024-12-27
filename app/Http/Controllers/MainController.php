<?php

namespace App\Http\Controllers;
use App\Mail\OrderShipped;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index(){
        $services=Service::get(['name','id','text','price','image']);
        return view('main',compact('services'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'surename' => 'required',
            'adress' => 'required',
            'number' => 'required',
            'email' => 'email',
            'note' => 'nullable',
            'service_id' => 'required'
        ]);
        $order = $request->all();
        $order['number']='7'.substr($order['number'],3, 3).substr($order['number'],8, 3).substr($order['number'],12, 4);
        Order::create($order);
        $service=Service::find($order['service_id']);
        $order['service_id']=$service['name'];
        Mail::to('april245@mail.ru')->send(new OrderShipped($order));
        return redirect()->back()->with('success', 'Заказ успешно добавлен');
    }
}
