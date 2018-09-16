<?php  

namespace App\Modules\common\traits;	

trait ResponseTrait {
    
	public function SendResponse($result,$code ='', $message)
	{
		 $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response($response, $this->successkey)
        			 ->header('Content-Type', 'this is maybe token');
	}


	 public function sendError($error,$errormessages = [],$errorKey = null)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        
        if($errorKey == '')
        {
            $errorKey = 401;
        }

        return response()->json($response, $errorKey);
    }

     protected function deletedResponse()
    {
        $response = [
        'code' => 204,
        'status' => 'success',
        'data' => [],
        'message' => 'Resource deleted'
        ];
        return response()->json($response, $response['code']);
    }

    public function TotleStudentInEachClass()
    {
       return $totleStudentsCapacity = 20;
    }

}