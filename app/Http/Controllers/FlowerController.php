<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FlowerController extends Controller
{
    public function flowerStoreFront(Request $req){


    	//Query the flower table to get all available flowers
    	$oFlowerQuery = DB::table('flowers')->get();

    	$aFlowerData = [];

    	//Iterate through each object to strip the data we want. In this case it's all of it.
    	foreach($oFlowerQuery as $item => $object){
    		
    		//If the object ID doesnt exist in the flower data array, Create it
    		if(!isset($aFlowerData[$object->id])){
    			$aFlowerData[$object->id]['name'] = '';
    			$aFlowerData[$object->id]['image'] = '';
    			$aFlowerData[$object->id]['price'] = 0;
    			$aFlowerData[$object->id]['stars'] = 0;
    		}

    		// Fill the array with the data
    		$aFlowerData[$object->id]['name'] = $object->name;
			$aFlowerData[$object->id]['image'] = $object->image;
			$aFlowerData[$object->id]['price'] = number_format($object->price,2);
			$aFlowerData[$object->id]['stars'] = $object->stars;
    	}

    	//unset the query now that we do not need it
    	unset($oFlowerQuery);

    	//return the proper blade as well as send the array to the front end
	    return view('flower',['aFlowerData'=> $aFlowerData]);
    }

    public function newPurchase(Request $req){
    	$aData = json_decode($req->Input('data'));
    	$dToday =  date('Y-m-d',time());
    	$iTax = 1.15;

    	$iTotalPrice = 0;
    	foreach($aData as $item => $object){
    		$iTotalPrice += $object->price;
    	}

    	$iTotalPrice *= $iTax;

     	DB::table('invoice')->insert(['date'=> $dToday,'amount'=>number_format($iTotalPrice,2)]);

    	return 'True';
    }
}
