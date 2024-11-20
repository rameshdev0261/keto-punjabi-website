<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseController;
use App\Http\Requests\ContactRequest;
use App\Models\ContactQuery;

class ContactController extends ResponseController
{
    public function index()
    {
        $data = ContactQuery::all();
        return $this->actionSuccess("Success", $data);
    }

    public function create(ContactRequest $request)
    {
        ContactQuery::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message
            ]
        );
        return $this->actionSuccess("Created successfully",  ContactQuery::all());
    }

    public function destroy($id)
    {
        ContactQuery::where('id', $id)->delete();
        return $this->actionSuccess("deleted Successfull",  ContactQuery::all());
    }
}
