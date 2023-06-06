<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return response([

            'clients' => $clients
        ], 200);
    }


    public function create(Request $request)
    {
        $clientData = [
            'name' => $request->name,
            'tel' => $request->tel,
            'adress' => $request->adress,
            'email' => $request->email,

        ];
        $client = Client::create($clientData);
        return response([
            'client' => $client,

        ], 200);
    }


    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return response([
            'message' => 'client est modifier',
        ], 200);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response([
            'message' => 'client est supprimer',
        ], 200);
    }
}
