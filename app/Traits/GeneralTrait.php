<?php

namespace App\Traits;

trait GeneralTrait
{


    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'msg'    => $msg,
            $key     => $value
        ]);
    }



}
