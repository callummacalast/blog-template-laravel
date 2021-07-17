<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Facades\Slave;
use App\Models\SlaveModels\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('clients', compact('clients'));
    }

    public function orders($id)
    {
        Slave::setConnection($id);

        $client = Client::findOrFail($id);
        $orders = Order::all();
       

        // dd($client);

        return view('orders', compact(['client', 'orders']));
    }
}
