<?php

namespace App\Http\Controllers;

use App\Models\EnfPre;
use Illuminate\Http\Request;

/**
 * Class EnfPreController
 * @package App\Http\Controllers
 */
class EnfPreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfPres = EnfPre::paginate();

        return view('enf-pre.index', compact('enfPres'))
            ->with('i', (request()->input('page', 1) - 1) * $enfPres->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfPre = new EnfPre();
        return view('enf-pre.create', compact('enfPre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EnfPre::$rules);

        $enfPre = EnfPre::create($request->all());

        return redirect()->route('enf-pres.index')
            ->with('success', 'EnfPre creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enfPre = EnfPre::find($id);

        return view('enf-pre.show', compact('enfPre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enfPre = EnfPre::find($id);

        return view('enf-pre.edit', compact('enfPre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EnfPre $enfPre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnfPre $enfPre)
    {
        request()->validate(EnfPre::$rules);

        $enfPre->update($request->all());

        return redirect()->route('enf-pres.index')
            ->with('success', 'EnfPre actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enfPre = EnfPre::find($id)->delete();

        return redirect()->route('enf-pres.index')
            ->with('success', 'EnfPre eliminado exitosamente');
    }
}
