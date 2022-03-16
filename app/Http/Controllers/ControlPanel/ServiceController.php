<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::all();
            return datatables()->of($services)
                ->editColumn('image', function (Service $service) {
                    return '<img src="' . asset('storage/' . $service->image) . '" width="50" alt="' . $service->name . '">';
                })
                ->addColumn('actions', function (Service $service) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $service->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('services.edit', $service->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }
        $services = Service::all();

        return view('c-panel.services.index', [
            'services' => $services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('c-panel.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreServiceRequest $request
     * @return \Illuminate\View\View
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image')->store('services', 'public');
        }

        $data['image'] = $image;

        $service = Service::create($data);

        return redirect()->route('services.index')->with('success', __('Service ') . $service->name . __(' Created Done!'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Service $service
     * @return \Illuminate\View\View
     */
    public function edit(Service $service)
    {
        return view('c-panel.services.edit', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\StoreServiceRequest $request
     * @param App\Models\Service $service
     *
     * @return \Illuminate\View\View
     */
    public function update(StoreServiceRequest $request, Service $service)
    {
        $data = $request->validated();

        $image = $service->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('services', 'public');
        }

        $data['image'] = $image;

        $service->update($data);

        return redirect()->route('services.index')->with('success', __('Service Updated Done!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Service $service
     * @return \Illuminate\View\View
     */
    public function destroy(Service $service)
    {
        $service->delete();
        Storage::disk('public')->delete($service->image);
        return redirect()->route('services.index')->with('success', __('Service Deleted Done!'));
    }
}
