<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\VedioAlbumRequest;
use App\Models\VedioAlbum;
use Illuminate\Http\Request;

class VedioAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $albums = VedioAlbum::all();
            return datatables()->of($albums)
                ->addColumn('actions', function (VedioAlbum $album) {
                    $delete = '<a href="#" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $album->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="' . route('vedio-album.edit', $album->id) . '" class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $albums = VedioAlbum::all();

        return view('c-panel.multiMedia.vedioAlbum.index',[
            'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('c-panel.multiMedia.vedioAlbum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VedioAlbumRequest $request)
    {
        $album = VedioAlbum::create($request->validated());

        return redirect()->route('vedio-album.index')->with('success',__('Album '). $album->name .__(' Created Successfully'));
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
    public function edit(VedioAlbum $vedio_album)
    {
        return view('c-panel.multiMedia.vedioAlbum.edit',[
            'album' => $vedio_album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VedioAlbumRequest $request, VedioAlbum $vedio_album)
    {
        $vedio_album->update($request->validated());

        return redirect()->route('vedio-album.index')->with('success',__('Album ').$vedio_album->name.__(' Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VedioAlbum $vedio_album)
    {
        //
        $vedio_album->delete();
        return redirect()->route('vedio-album.index')->with('success',__('Album Deleted Successfully'));

    }
}
