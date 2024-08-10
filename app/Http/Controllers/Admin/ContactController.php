<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\contactFormRequest;
use App\Http\Services\contact\contactService;
use App\Models\c;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    protected $contact = '';
    public function __construct(contactService $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = $this->contact->getFirst();
        if (!$contact) return redirect('/admin/contact/add');
        return view('admin.contacts.view', [
            'title' => 'Chi tiết trang liên hệ',
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = $this->contact->getFirst();
        if ($contact) return redirect('/admin/contact/list');

        return view('admin.contacts.add', [
            'title' => 'Cấu hình trang liên hệ',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(contactFormRequest $request)
    {
        $contact = $this->contact->getFirst();
        if ($contact) {
            Session::flash('error', 'Trang liên hệ đã tồn tại không thể tạo thêm được nữa');
            return redirect('/admin/contact/list');
        }

        $result = $this->contact->insert($request);
        if ($result) {
            Session::flash('success', 'Đã tạo trang liên hệ thành công');
           return redirect('/admin/contact/list');
        }

        Session::flash('error', 'Tạo trang liên hệ không thành công');
       return redirect('/admin/contact/list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', [
            'title' => 'Cấu hình lại trang liên hệ',
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $result = $this->contact->update($contact, $request);
        if ($result) {
            Session::flash('success', 'Đã cập nhật trang liên hệ thành công');
           return redirect('/admin/contact/list');
        }

        Session::flash('error', 'Cập nhật trang liên hệ không thành công');
       return redirect('/admin/contact/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = $this->contact->remove($request);
        return $result ?
                response()->json(['error' => false, 'message' => 'Đã xóa thông tin liên hệ thành công']) :
                response()->json(['error' => true, 'message' => 'Xóa thông tin liên hệ không thành công'], 500);
    }
}