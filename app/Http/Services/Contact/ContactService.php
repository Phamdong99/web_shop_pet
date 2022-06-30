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
        $patch_file = $request->input('file');

        if (empty($patch_file)){
            $patch_file = $contact->thumb;
        }

        $contact->address = (string) $request->input('address');
        $contact->phone = (string) $request->input('phone');
        $contact->email = (string) $request->input('email');
        $contact->facebook = (string) $request->input('facebook');
        $contact->thumb = $patch_file;
        $contact->save();

        Session::flash('success','Sửa thông tin liên hệ thành công');
        return true;
    }
}
