<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Modules\Admin\Entities\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
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
    $encryptedpassword = Hash::make($password);
    
    $user = $this->user->where('email',$email)->first();
   if(!is_null($user)) {
   if(Hash::check($password, $user->password))
   {
    $apiToken = base64_encode(str_random(500));                             
    $user->authentication_key = $apiToken;    
           $result = $this->user
                    ->where(['email'=> $email])
                     ->update(['authentication_key' => $apiToken]);
        $response = [
            'status' => true,
            'authentication_key' => $apiToken,
            'message' => 'Login successFully',
        ]; 
       
    return response()->json(['data' => $response],200);     
   }
   else 
   {
       $response = [ 
        'message' => 'Oopps.. seems Password dont match our Database',
       ];
       return response()->json(['data' => $response,'status' => 'false'],401);
   }
   } else {
    $response = [
        'message' => 'Oopps.. seems Email dont match On our Database',
       ];
       return response()->json(['data' => $response,'status' => 'false'],401);

   }
    }

}
