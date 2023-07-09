<?php

namespace App\Services;

use App\Models\Contact;

class ContactsServices
{
    public function count()
    {
        return Contact::count();
    }
    public function show($search)
    {
        if (empty($search)) {
            $contacts = Contact::paginate(10);
        } else {
            $contacts = Contact::where('address', 'LIKE', '%' . $search . '%')->paginate(10);
            $contacts->appends(request()->input())->links();
        }
        return $contacts;
    }
    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();
    }
    public function add($city, $address, $desc, $phone)
    {
        return $contact = Contact::insert([
            'address' => $address,
            'desc' => $desc,
            'phone' => $phone,
            'city_id' => $city,
        ]);
    }
    public function find($id)
    {
        return $contact = Contact::find($id);
    }
    public function edit($id, $city, $address, $desc, $phone)
    {
        $contact = Contact::find($id);

        if($contact->city_id != $city)
        {
            $contact->city_id = $city;
        }
        if($contact->address != $address)
        {
            $contact->address = $address;
        }
        if($contact->desc != $desc)
        {
            $contact->desc = $desc;
        }
        if($contact->phone != $phone)
        {
            $contact->phone = $phone;
        }
        return $contact->save();
    }
}
