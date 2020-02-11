<?php

namespace App\Http\Controllers;

use App\Traits\phpTrait;
use Illuminate\Http\Request;

class ATGController extends Controller
{
    use phpTrait;

    public function postdata(Request $request)
    {
        //validate the data
        $this->validator($request->all())->validate();

        //if valid send an email
        $this->email($request->email);

        // create new row in the database
        $this->create($request->all());

        return redirect()->back()->with("message", 'Data Submitted Successsfully');
    }
}
