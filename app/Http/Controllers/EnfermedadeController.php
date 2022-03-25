<?php

namespace App\Http\Controllers;

use App\Models\Enfermedade;
use Illuminate\Http\Request;

/**
 * Class EnfermedadeController
 * @package App\Http\Controllers
 */
class EnfermedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades = Enfermedade::paginate();

        return view('enfermedade.index', compact('enfermedades'))
            ->with('i', (request()->input('page', 1) - 1) * $enfermedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermedade = new Enfermedade();
        return view('enfermedade.create', compact('enfermedade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Enfermedade::$rules);

        $enfermedade = Enfermedade::create($request->all());

        return redirect()->route('enfermedades.index')
            ->with('success', 'Enfermedade creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enfermedade = Enfermedade::find($id);

        return view('enfermedade.show', compact('enfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enfermedade = Enfermedade::find($id);

        return view('enfermedade.edit', compact('enfermedade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Enfermedade $enfermedade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enfermedade $enfermedade)
    {
        request()->validate(Enfermedade::$rules);

        $enfermedade->update($request->all());

        return redirect()->route('enfermedades.index')
            ->with('success', 'Enfermedade actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enfermedade = Enfermedade::find($id)->delete();

        return redirect()->route('enfermedades.index')
            ->with('success', 'Enfermedade eliminado exitosamente');
    }
}
