<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use App\Models\Client;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $specialties = Specialty::all();
            return datatables()->of($specialties)
                ->editColumn('image', function (Specialty $specialty) {
                    return '<img src="' . asset('storage/' . $specialty->image) . '" width="50" alt="' . $specialty->name . '">';
                })
                ->addColumn('actions', function (Specialty $specialty) {
                    $show = '<a href="' . route('specialties.show', $specialty->id) . '" class="btn btn-info btn-sm" >' .
                        'عرض</a>';
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $specialty->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('specialties.edit', $specialty->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $show . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }
        $specialties = Specialty::all();
        return view('c-panel.specialty.index', [
            'specialties' => $specialties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('c-panel.specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {
        $data = $request->validated();

        $image = null;

//        dd($data);
        DB::beginTransaction();

        try {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image')->store('specialties', 'public');
            }

            $data['image'] = $image;

            $specialty = Specialty::create($data);


            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $image = $file->store('pages', 'public');
                    $specialty->images()->create([
                        'image' => $image,
                    ]);
                }
            }

            DB::commit();

        } catch (Throwable $e) {
            DB::rollBack();

            return $e;
        }

        return redirect()->route('specialties.index')->with('success', __('Specialty ') . $specialty->title . __(' Created Done!'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        return view('c-panel.specialty.show', [
            'specialty' => $specialty,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        return view('c-panel.specialty.edit', [
            'specialty' => $specialty,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {

        $data = $request->validated();

        //dd($data['description']);

        $image = $specialty->image;

        DB::beginTransaction();

        try {

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                Storage::disk('public')->delete($image);
                $image = $request->file('image')->store('specialties', 'public');
                $data['image'] = $image;
            }


            foreach ($specialty->images as $gallery) {
                if ($request->has("check_" . $gallery->id) == 1) {
                    Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }


            $specialty->update($data);
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $file) {
                    $gallery_image = $file->store('specialties', 'public');
                    $specialty->images()->create([
                        'image' => $gallery_image,
                    ]);
                }
            }
            DB::commit();

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('specialties.index')
                ->with('error', 'Operation failed');
        }

        return redirect()->route('specialties.index')->with('success', __('Specialty ') . $specialty->title . __(' Updated Done!'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        foreach ($specialty->images as $gallery) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->delete();
        }
        Storage::disk('public')->delete($specialty->image);
        $specialty->delete();
        return redirect()->route('specialties.index')->with('success', __('Specialty Deleted Done!'));
    }
}
