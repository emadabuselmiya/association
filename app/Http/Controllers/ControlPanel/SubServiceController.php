<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubServiceRequest;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = SubService::all();
            return datatables()->of($services)
                ->editColumn('image', function (SubService $subService) {
                    return '<img src="' . asset('storage/' . $subService->image) . '" width="50" alt="' . $subService->name . '">';
                })
                ->addColumn('parent', function (SubService $subService) {

                    return $subService->service->name;

                })
                ->addColumn('actions', function (SubService $subService) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $subService->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('subservices.edit', $subService->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }
        $sub_services = SubService::all();

        return view('c-panel.services.subservices.index', [
            'sub_services' => $sub_services,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('c-panel.services.subservices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubServiceRequest $request)
    {
        $data = $request->validated();

        $image = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image')->store('subservices', 'public');
        }

        $data['image'] = $image;

        $service = SubService::create($data);

        return redirect()->route('subservices.index')->with('success', __('Sub Service ') . $service->name . __(' Created Done!'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_service = SubService::findOrFail($id);
        return view('c-panel.services.subservices.edit', [
            'sub_service' => $sub_service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubServiceRequest $request, $id)
    {
        $sub_service = SubService::findOrFail($id);

        $data = $request->validated();

        $image = $sub_service->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('subservices', 'public');
        }

        $data['image'] = $image;

        $sub_service->update($data);

        return redirect()->route('subservices.index')->with('success', __('Sub Service Updated Done!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_service = SubService::findOrFail($id);
        $sub_service->delete();
        Storage::disk('public')->delete($sub_service->image);
        return redirect()->route('subservices.index')->with('success', __('Sub Service Deleted Done!'));
    }
}
