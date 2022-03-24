<?php

namespace App\Http\Controllers\ControlPanel;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $clients = Client::all();
            return datatables()->of($clients)
                ->editColumn('image', function (Client $client) {
                    return '<img src="' . asset('storage/' . $client->image) . '" width="50" alt="' . $client->name . '">';
                })
                ->addColumn('actions', function (Client $client) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $client->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('clients.edit', $client->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->addIndexColumn()
                ->make(true);
        }
        $clients = Client::all();

        return view('c-panel.clients.index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('c-panel.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreClientRequest $request
     * @return \Illuminate\View\View
     */
    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image')->store('clients', 'public');
        }

        $data['image'] = $image;

        $client = Client::create($data);

        return redirect()->route('clients.index')->with('success', __('Client ') . $client->name . __(' Created Done!'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Client $client
     * @return \Illuminate\View\View
     */
    public function edit(Client $client)
    {
        return view('c-panel.clients.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\StoreClientRequest $request
     * @param App\Models\Client $client
     *
     * @return \Illuminate\View\View
     */
    public function update(StoreClientRequest $request, Client $client)
    {
        $data = $request->validated();

        $image = $client->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('clients', 'public');
            $data['image'] = $image;
        }


        $client->update($data);

        return redirect()->route('clients.index')->with('success', __('Client Updated Done!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Client $client
     * @return \Illuminate\View\View
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Storage::disk('public')->delete($client->image);
        return redirect()->route('clients.index')->with('success', __('Client Deleted Done!'));
    }
}
