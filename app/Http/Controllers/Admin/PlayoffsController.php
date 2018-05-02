<?php

namespace App\Http\Controllers\Admin;

use App\Playoff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePlayoffsRequest;
use App\Http\Requests\Admin\UpdatePlayoffsRequest;

class PlayoffsController extends Controller
{
    /**
     * Display a listing of Playoff.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('playoff_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('playoff_delete')) {
                return abort(401);
            }
            $playoffs = Playoff::onlyTrashed()->get();
        } else {
            $playoffs = Playoff::all();
        }

        return view('admin.playoffs.index', compact('playoffs'));
    }

    /**
     * Show the form for creating new Playoff.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('playoff_create')) {
            return abort(401);
        }
        
        $playofftournaments = \App\Tournament::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $seasontournaments = \App\Tournament::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.playoffs.create', compact('playofftournaments', 'seasontournaments'));
    }

    /**
     * Store a newly created Playoff in storage.
     *
     * @param  \App\Http\Requests\StorePlayoffsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayoffsRequest $request)
    {
        if (! Gate::allows('playoff_create')) {
            return abort(401);
        }
        $playoff = Playoff::create($request->all());



        return redirect()->route('admin.playoffs.index');
    }


    /**
     * Show the form for editing Playoff.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('playoff_edit')) {
            return abort(401);
        }
        
        $playofftournaments = \App\Tournament::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $seasontournaments = \App\Tournament::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $playoff = Playoff::findOrFail($id);

        return view('admin.playoffs.edit', compact('playoff', 'playofftournaments', 'seasontournaments'));
    }

    /**
     * Update Playoff in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayoffsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayoffsRequest $request, $id)
    {
        if (! Gate::allows('playoff_edit')) {
            return abort(401);
        }
        $playoff = Playoff::findOrFail($id);
        $playoff->update($request->all());



        return redirect()->route('admin.playoffs.index');
    }


    /**
     * Display Playoff.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('playoff_view')) {
            return abort(401);
        }
        $playoff = Playoff::findOrFail($id);

        return view('admin.playoffs.show', compact('playoff'));
    }


    /**
     * Remove Playoff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('playoff_delete')) {
            return abort(401);
        }
        $playoff = Playoff::findOrFail($id);
        $playoff->delete();

        return redirect()->route('admin.playoffs.index');
    }

    /**
     * Delete all selected Playoff at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('playoff_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Playoff::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Playoff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('playoff_delete')) {
            return abort(401);
        }
        $playoff = Playoff::onlyTrashed()->findOrFail($id);
        $playoff->restore();

        return redirect()->route('admin.playoffs.index');
    }

    /**
     * Permanently delete Playoff from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('playoff_delete')) {
            return abort(401);
        }
        $playoff = Playoff::onlyTrashed()->findOrFail($id);
        $playoff->forceDelete();

        return redirect()->route('admin.playoffs.index');
    }
}
