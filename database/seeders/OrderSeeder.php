<?php

namespace Database\Seeders;
use App\Models\Client;
use App\Facades\Slave;
use App\Models\SlaveModels\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();

        $clients->each( function ($client) { // Iterating over the $clients connection and passing it to a callback
            Slave::setConnection($client->id); // Setting the connection of the db
                Order::factory()->count(50)->connection(Slave::getConnectionName())->create();
        });
    }
}
