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
        $contact = $service->add($city, $address, $desc);

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
    public function edit_($id, ContactsRequest $request, ContactsServices $service)
    {
        $city = $request->get('city');
        $address = $request->get('address');
        $desc = $request->get('desc');
        $edit = $service->edit($id, $city, $address, $desc);
        if ($edit) {
            return response()->json(['url' => route('admin.contacts')]);
        }
    }
}
