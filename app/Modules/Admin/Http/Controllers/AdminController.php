<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Modules\Admin\Interfaces\UserInterface;
use App\Modules\Common\traits\ResponseTrait;


class AdminController extends BaseController
{   
    use ResponseTrait;
    private $iUser;
    public function __construct(UserInterface $iUser)
    {
       
        $this->iUser = $iUser;
    }
    //  this is for registering Student First time

    public function getRegisterAdmin(Request $request)
    {
        $all = $request->all();  
        $result = $this->iUser->RegisterUser($all);
        if(is_array($result))
        {
            return response()->json(['messgae' => $result,'msg' => 'User Added'],401);
            
        } else {

            return response()->json([ 'data' => $result],200);
        }
        
    }

    
}
