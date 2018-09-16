<?php

namespace App\Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Modules\Setting\Interfaces\SettingInterface;
use App\Modules\Common\traits\ResponseTrait;

class SettingController extends BaseController
{
   use ResponseTrait;

    private $setting;

    public function __construct(SettingInterface $iSetting)
    {
        $this->setting = $iSetting;
    }

    // public function getPagedSetting(Request $request)
    // {
    //     dd($this->setting);
    // }
     public function getPagedSetting()
    {
        $this->setting->getAllSetting();
    }
     public function createSetting(Request $request)
    {
        try {

         $all = $request->all();

         $result = $this->setting->addSetting($all);
         return response()->json([  $result,200,'Data added Successfully']);
        //  $this->SendResponse($result, 200,'Data added Successfully');
        }             
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
        
    }

    public function updateSetting(Request $request)
    {
        
        $data = $request->all();
       $result = $this->setting->updateSetting($data);
       
       return response()->json([ $result, 200,'updated successfully']);
        
    }

   

}
