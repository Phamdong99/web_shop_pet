<?php

namespace App\Http\Services\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactService
{
    public function get()
    {
        return Contact::orderbyDesc('id')->get();
    }
    public function update($contact, $request)
    {
        $contact->address = (string) $request->input('name');
        $contact->phone = (string) $request->input('phone');
        $contact->email = (string) $request->input('email');
        $contact->facebook = (string) $request->input('facebook');
        $contact->thumb = (string) $request->input('file');
        $contact->save();

        Session::flash('success','Sửa thông tin liên hệ thành công');
        return true;
    }
}
