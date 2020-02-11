<?php

namespace App\Http\Controllers;

use App\Traits\phpTrait;
use Illuminate\Http\Request;

class WebServicesController extends Controller
{
    use phpTrait;

    public function postdata(Request $request)
    {
        if ($request->ajax()) {
            //validate the data
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                //if validation fails return response
                $errors = $validator->errors();
                $data=['status' => '0', 'errors' => $errors];
                return response()->json($data);

            } else {
                //if validation succeeds create new row and send an email
                $this->email($request->email);
                $this->create($request->all());
                return response()->json([
                    'status' => '1', 'message' => 'data accepted']);

            }

        }

    }
}
