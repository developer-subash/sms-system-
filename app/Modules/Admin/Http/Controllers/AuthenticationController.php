<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Modules\Admin\Entities\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class AuthenticationController extends BaseController
{
  private $user;
public function __construct(User $user)
{
    $this->user = $user;
}
public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');
   $user = $this->user->where('email',$email)->first();
   if(!is_null($user)) {
   if(Hash::check($password, $user->password))
   {
    $apiToken = base64_encode(str_random(500));  
    $this->user->where(['email'=> $email, 'password' => $password])->update(['api_token' => "$apiToken"]);
       $response = [
        'code' => 200,
        'api_token' => $apiToken,
        'message' => 'User Login successFully',

       ]; 
       
    return response()->json(['data' => $response, 'status' => 'true']); 
    
   }
   else 
   {
       $response = [
        'code' => 401,
        'message' => 'Oopps.. seems Password dont match our Database',
       ];
       return response()->json(['data' => $response,'status' => 'false']);
   }
   } else {
    $response = [
        'code' => 401,
        'message' => 'Oopps.. seems Email dont match On our Database',
       ];
       return response()->json(['data' => $response,'status' => 'false']);

   }
    }

}
