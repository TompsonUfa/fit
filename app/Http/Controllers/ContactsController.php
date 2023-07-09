<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest;
use App\Services\ContactsServices;
use App\Services\CitiesServices;

class ContactsController extends Controller
{
    public function show(Request $request, ContactsServices $service)
    {
        $search = $request->get('search');
        $total = $service->count();
        $contacts = $service->show($search);
        return view('admin.contacts.index', ['contacts' => $contacts, 'total' => $total]);
    }
    public function add(CitiesServices $cities)
    {
        $cities = $cities->list();
        return view('admin.contacts.add', ['cities' => $cities]);
    }
    public function add_(ContactsRequest $request, ContactsServices $service)
    {
        $city = $request->get('city');
        $address = $request->get('address');
        $desc = $request->get('desc');
        $phone = $request->get('phone');
        $contact = $service->add($city, $address, $desc, $phone);

        if ($contact) {
            return response()
                ->json([
                    'url' => route('admin.contacts')
                ]);
        }
    }
    public function delete(Request $request, ContactsServices $service)
    {
        $contactId = $request->get('id');
        $service->delete($contactId);
    }
    public function edit($id, CitiesServices $cities, ContactsServices $service)
    {
        $cities = $cities->list();
        $contact = $service->find($id);
        return view('admin.contacts.edit', ['cities' => $cities, 'contact' => $contact]);
    }
    public function edit_($id, Request $request, ContactsServices $service)
    {
        $contact = $service->find($id);
        $city = $request->get('city');
        $address = $request->get('address');
        $desc = $request->get('desc');
        $phone = $request->get('phone');

        if ($contact['city_id'] == $city) {
            $cityValid = 'required';
        } else {
            $cityValid = 'required|unique:contacts,city_id';
        }

        $request->validate([
            'address' => 'required',
            'desc' => 'required',
            'city' => $cityValid
        ]);

        $edit = $service->edit($id, $city, $address, $desc, $phone);
        if ($edit) {
            return response()->json(['url' => route('admin.contacts')]);
        }
    }
}
