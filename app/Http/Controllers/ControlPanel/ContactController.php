<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contacts = Contact::all();
            return datatables()->of($contacts)
                ->addColumn('date', function (Contact $contact) {
                    return  Carbon::parse($contact->created_at)->format('Y-m-d');
                })
                ->addColumn('actions', function (Contact $contact) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $contact->id . '">' .
                        'حذف</a>';
                    $show = ' <a href="' . route('contacts.show', $contact->id) . '" class="btn btn-sm btn-success">عرض</a>';

                    return $delete . $show;

                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        # code...
        $contacts = Contact::all();

        return view('c-panel.contacts.index',[
            'contacts' => $contacts,
        ]);
    }

    public function show(Contact $contact)
    {
        # code...
        return view('c-panel.contacts.edit',[
            'contact' => $contact,
        ]);
    }

    public function destroy(Contact $contact)
    {
        # code...
        $contact->delete();
        return redirect()->route('contacts.index')->with('success',__('Message Deleted Successfully!'));
    }
}
