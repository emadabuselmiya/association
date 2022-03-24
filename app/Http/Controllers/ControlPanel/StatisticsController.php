<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Statistics;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $statistics = Statistics::all();
            return datatables()->of($statistics)
                ->addColumn('actions', function (Statistics $statistics) {
                    $delete = '<a href="javascript:void(0);" class="btn btn-danger btn-sm" data-toggle= "modal" data-target= "#modals-delete-' . $statistics->id . '">' .
                        'حذف</a>';
                    $edit = ' <a href="javascript:void(0);" data-toggle= "modal" data-target= "#modals-edit-' . $statistics->id . '"class="btn btn-sm btn-primary">تعديل</a>';

                    return $delete . $edit;

                })
                ->rawColumns(['actions'])
                ->addIndexColumn()
                ->make(true);
        }
        $statistics = Statistics::all();

        return view('c-panel.statistics.index', [
            'statistics' => $statistics,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Statistics::create($request->all());

        return redirect()->back()->with('success', 'تم إضافة الإحصائية بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|numeric',
            'description' => 'required|string',
        ]);
        $statistic = Statistics::findOrFail($id);
        $statistic->update($request->all());

        return redirect()->back()->with('success', 'تم تعديل الإحصائية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statistic = Statistics::findOrFail($id);
        $statistic->delete();

        return redirect()->back()->with('success', 'تم حذف الإحصائية بنجاح');
    }
}
