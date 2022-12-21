<?php 
namespace App\Helper;
use Illuminate\Support\Facades\URL;
class Response{
    public static function data($data = [],$message="successfully",$code=200,$success=true) 
    {
        $dataFormat = [
            'code'=>$code,
            'message'=>$message,
            'success'=>$success,
            'data'=>$data,
        ];
        return response()->json($dataFormat,$code);
    }
    public static function dataError($data=[],$code=401,$message='Error')
    {
        if (!$code) {
            $code = \Symfony\Component\HttpFoundation\Response::HTTP_INTERNAL_SERVER_ERROR;
        }
       $dataFormat = [
            'code'=>$code,
            'success'=>false,
            'message'=>$message,
            'data'=>$data,
       ];
       return response()->json($dataFormat,$code);
    }
}
?>