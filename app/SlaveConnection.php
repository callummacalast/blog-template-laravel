<?php

namespace App;

use App\Models\Client;
use Illuminate\Support\Facades\Config;

class SlaveConnection
{
    /**
     * @var Client
     */
    private $client;

    /**
     * SlaveConnection constructor.
     * @param Client $client
     */
    public function __construct(Client $client) // Passing in the client and assigning it as it is passed in
    {
        $this->client = $client;
    }

    /**
     * @param int $id
     */
    public function setConnection(int $id)
    {
        $this->client = $this->client->findOrFail($id); // Trying to find the $id of the connection

        Config::set('database.connections.' . $this->client->database, [ // Looking into the databse.connections config, and setting the connection to the one it finds
            'driver'   => 'mysql',
            'host'     => $this->client->host,
            'port'     => 3306,
            'database' => $this->client->database,
            'username' => $this->client->username,
            'password' => $this->client->password,
        ]);
    }

    /**
     * @return string
     */
    public function getConnectionName()
    {
        // $this->client->database;
        return $this->client->database; // Returns the database name
    }
}