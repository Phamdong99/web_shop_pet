<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Contact\ContactService;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function index()
    {
        return view('admin.info.contact', [
            'title'=>'Thông tin liên hệ',
            'contacts'=>$this->contactService->get()
        ]);
    }
    public function show()
    {
        return view('contact', [
            'title'=>'Thông tin liên hệ',
            'contacts'=>$this->contactService->get()
        ]);
    }
    public function show_info()
    {
        return view('admin.info.edit_contact', [
            'title'=>'Thông tin liên hệ',
            'contacts'=>$this->contactService->get()
        ]);
    }
    public function update(Contact $contact, Request $request)
    {
            $this->contactService->Update($contact, $request);
            return Redirect('admin/contacts/contact');

    }
}
