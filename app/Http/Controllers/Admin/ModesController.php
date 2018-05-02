<?php

namespace App\Http\Controllers\Admin;

use App\Mode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreModesRequest;
use App\Http\Requests\Admin\UpdateModesRequest;

class ModesController extends Controller
{
    /**
     * Display a listing of Mode.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('mode_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('mode_delete')) {
                return abort(401);
            }
            $modes = Mode::onlyTrashed()->get();
        } else {
            $modes = Mode::all();
        }

        return view('admin.modes.index', compact('modes'));
    }

    /**
     * Show the form for creating new Mode.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('mode_create')) {
            return abort(401);
        }
        return view('admin.modes.create');
    }

    /**
     * Store a newly created Mode in storage.
     *
     * @param  \App\Http\Requests\StoreModesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModesRequest $request)
    {
        if (! Gate::allows('mode_create')) {
            return abort(401);
        }
        $mode = Mode::create($request->all());



        return redirect()->route('admin.modes.index');
    }


    /**
     * Show the form for editing Mode.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('mode_edit')) {
            return abort(401);
        }
        $mode = Mode::findOrFail($id);

        return view('admin.modes.edit', compact('mode'));
    }

    /**
     * Update Mode in storage.
     *
     * @param  \App\Http\Requests\UpdateModesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModesRequest $request, $id)
    {
        if (! Gate::allows('mode_edit')) {
            return abort(401);
        }
        $mode = Mode::findOrFail($id);
        $mode->update($request->all());



        return redirect()->route('admin.modes.index');
    }


    /**
     * Display Mode.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('mode_view')) {
            return abort(401);
        }
        $tournaments = \App\Tournament::where('tournamentmode_id', $id)->get();

        $mode = Mode::findOrFail($id);

        return view('admin.modes.show', compact('mode', 'tournaments'));
    }


    /**
     * Remove Mode from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('mode_delete')) {
            return abort(401);
        }
        $mode = Mode::findOrFail($id);
        $mode->delete();

        return redirect()->route('admin.modes.index');
    }

    /**
     * Delete all selected Mode at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('mode_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Mode::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Mode from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('mode_delete')) {
            return abort(401);
        }
        $mode = Mode::onlyTrashed()->findOrFail($id);
        $mode->restore();

        return redirect()->route('admin.modes.index');
    }

    /**
     * Permanently delete Mode from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('mode_delete')) {
            return abort(401);
        }
        $mode = Mode::onlyTrashed()->findOrFail($id);
        $mode->forceDelete();

        return redirect()->route('admin.modes.index');
    }
}
