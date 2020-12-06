<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Type;
class ApiController extends Controller
{
    public function getAllClients(){
    	$clients=Client::orderBy('name')->get()->toJson(JSON_PRETTY_PRINT);

    	return response($clients,200);


    }
    public function createClient(Request $request){
    	$client=new Client;
       
       	$client->name = $request->name;
      $client->type=$request->type;
    	$client->number= $request->number;
    	$client->save();

    	return response()->json([
    		"message"=>"The client is successfully created"

    	],201);
       	
       
    	

    }

     public function getClient($name){
     	if(Client::where ('name',$name)->exists()){
     		$client=Client::where('name',$name)->get()->toJson(JSON_PRETTY_PRINT);
     		return response($client,200);

     	}
     	else
     	{
     		return response()->json([
     			"message"=>"Client not found"],404);
     	}

     }
     public function updateClient(Request $request,$id){

        if (Client::where('id', $id)->exists()) {
        $client = Client::find($id);
        $client->type = is_null($request->type) ? $client->type : $request->type;
  
        $client->save();

        return response()->json([
            "message" => "records updated successfully"
        ], 200);
        } else {
        return response()->json([
            "message" => "client not found"
        ], 404);
        
    }

     }
     public function deleteClient($id){

     	if(Client:: where('id',$id)->exists()){
     		$client= Client::find($id);
     		$client->delete();
     		return response()->json([
           "message"=>"Recors deleted"

     		],202);
     	}else{
     		return response()->json([
     			"message"=>"Client not found"




     		],404);
     	}

     }
}
