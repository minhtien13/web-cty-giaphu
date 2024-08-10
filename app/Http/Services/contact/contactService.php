<?php

namespace App\Http\Services\contact;

use App\Models\Contact;

class contactService
{
    public function insert($request)
    {
        try {
            Contact::create($request->all());
            return true;
        } catch (\Exception $err) {
            return false;
        }
    }

    public function getFirst()
    {
        $contact = Contact::orderByDesc('id')->first();
        if ($contact) {
            $this->checkRow($contact->id);
            return $contact;
        }

        return false;
    }

    public function checkRow($contactId = 0)
    {
       $contacts = Contact::select('id')->get();
       foreach ($contacts as $contact)  {
            if ($contact->id != $contactId) {
                Contact::where('id', $contact->id)->delete();
            }
       }
    }

    public function remove($request)
    {
        try {
            $contactID = (int)$request->input("id");
            $result = Contact::where("id", $contactID)->first();
            if ($result) {
                Contact::where("id", $contactID)->delete();
                return true;
            }

            return false;

        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($contact, $request)
    {
        try {
            $contact->fill($request->all());
            $contact->save();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


}