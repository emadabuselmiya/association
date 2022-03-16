<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::all();
            return datatables()->of($projects)
                ->editColumn('image', function (Project $project) {
                    return '<img src="' . asset('storage/' . $project->main_image) . '" width="50" alt="' . $project->name . '">';
                })
                ->editColumn('service_name', function (Project $project) {
                    return $project->service->name;
                })
                ->editColumn('client_name', function (Project $project) {
                    return $project->client->name ?? __('no client') ;
                })
                ->addColumn('actions', function (Project $project) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $project->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('projects.edit', $project->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions', 'image'])
                ->make(true);
        }
        $projects = Project::all();

        return view('c-panel.projects.index',[
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('c-panel.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $image = null;

        DB::beginTransaction();

        try
        {
            if($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                $image = $request->file('main_image')->store('projects','public');
            }

            $data['main_image'] = $image;

            $project = Project::create($data);

            if($request->hasFile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $image = $file->store('projects','public');
                    $project->images()->create([
                        'image' => $image,
                    ]);
                }
            }

            DB::commit();

        }catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.index')
                ->with('error', 'Operation failed');
        }

        return redirect()->route('projects.index')->with('success' ,__('Project ').$project->name.__(' Created Done!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('c-panel.projects.edit',[
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request, Project $project)
    {

        $data = $request->validated();

        $image = $project->main_image;

        DB::beginTransaction();

        try
        {

            if($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                Storage::disk('public')->delete($image);
                $image = $request->file('main_image')->store('projects','public');
                $data['main_image'] = $image;
            }



            foreach($project->images as $gallery)
            {
                if($request->has("check_".$gallery->id) == 1)
                {
                    Storage::disk('public')->delete($gallery->image);
                    $gallery->delete();
                }
            }


            $project->update($data);
            if($request->hasFile('gallery'))
            {
                foreach($request->file('gallery') as $file)
                {
                    $gallery_image = $file->store('projects','public');
                    $project->images()->create([
                        'image' => $gallery_image,
                    ]);
                }
            }
            DB::commit();

        }catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('projects.index')
                ->with('error', 'Operation failed');
        }

            return redirect()->route('projects.index')->with('success' ,__('Project ').$project->name.__(' Updated Done!'));

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        foreach($project->images as $gallery)
        {
                Storage::disk('public')->delete($gallery->image);
                $gallery->delete();
        }

        Storage::disk('public')->delete($project->main_image);
        $project->delete();
        return redirect()->route('projects.index')->with('success',__('Project Deleted Done!'));
    }
}
