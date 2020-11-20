<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class AdminClientController extends Controller
{
 
   public function index()
   {

   		$clients = Client::orderBy('name','asc')->paginate(10);
     	
   		$viewData = [
   			'clients' => $clients
   		];

   		return view('admin.client.index',$viewData);
   }



    public function status($id)
    {
        $client = Client::find($id);
        $client->status = ! $client->status;
        $client->save();

        return redirect()->back();
    }

    public function view($id)
    {
    	$client = Client::find($id);
    	return view('admin.client.view',compact('client'));
    }

    public function delete($id)
  	{
     	$client = Client::find($id);

     	if($client){

       	 $client->delete();;
     	} 

     	return redirect()->back();
   }
   


}


