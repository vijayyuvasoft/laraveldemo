<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GAModel;

use View;
use Session;
use Redirect;
use Input;

class GAController extends Controller
{

	public function __construct(){

		//parent::__construct();

		$this->middleware('auth');

	}

    public function index(){

    	$GA = GAModel::where("setting_name","google_analytics_key")->first();

    	return View::make("GAapi.index")->with("credentials",$GA);

    }

    public function edit($setting_name){

    	//die($setting_name);

    	$GA = GAModel::where("setting_name",$setting_name)->first();

    	return View::make("GAapi.edit")->with("credentials",$GA);
    }

    public function update($setting_name){

    	$GA = GAModel::where("setting_name",$setting_name)->first();

    	$GA->setting_value = Input::get("api_key");

    	$GA->save();

    	Session::flash("message","API Key Saved Successfully");

    	return Redirect::to("/google-analytics-credentials");
    }
}
