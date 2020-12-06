<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Validator;
use AppUser;
use AppHttpRequestRegisterAuthRequest;
use TymonJWTAuthExeptionsJWTExeption;
use SymfonyComponentHttpFoundationResponse;
use App\Models\User;

class JwtAuthController extends Controller
{
	public $token=true;
	public function register(Request $request){
		$validator=Validator::make($request->all(),
			[
				'name'=>'required',
				'email'=>'required|email',
				'password'=>'required',
				
			]);
		if($validator->fails()){
			return response()->json(['error'=>$validator->errors()],401);
		}
		$user= new User();
		$user->name=$request->name;
		$user->email=$request->email;
		$user->password=bcrypt($request->password);
		$user->save();
		if($this->token){
			return $this->login($request);
		}
		return response()->json([
			'success'=>true,
			'data'=>$user],Response::HTTP_OK);
	}


	

  public function getAllUsers(){
    	$user=User::get()->toJson(JSON_PRETTY_PRINT);
    	return response($user,200);


    }

    //
}
