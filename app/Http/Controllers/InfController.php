<?php

namespace App\Http\Controllers;

use App\Models\Inf;
use Illuminate\Http\Request;

/**
 * Class InfController
 * @package App\Http\Controllers
 */
class InfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infs = Inf::paginate();

        return view('inf.index', compact('infs'))
            ->with('i', (request()->input('page', 1) - 1) * $infs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inf = new Inf();
        return view('inf.create', compact('inf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inf::$rules);

        $inf = Inf::create($request->all());

        return redirect()->route('infs.index')
            ->with('success', 'Inf creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inf = Inf::find($id);

        return view('inf.show', compact('inf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inf = Inf::find($id);

        return view('inf.edit', compact('inf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inf $inf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inf $inf)
    {
        request()->validate(Inf::$rules);

        $inf->update($request->all());

        return redirect()->route('infs.index')
            ->with('success', 'Inf actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inf = Inf::find($id)->delete();

        return redirect()->route('infs.index')
            ->with('success', 'Inf eliminado exitosamente');
    }
}
