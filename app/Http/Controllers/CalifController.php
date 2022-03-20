<?php

namespace App\Http\Controllers;

use App\Models\Calif;
use Illuminate\Http\Request;

/**
 * Class CalifController
 * @package App\Http\Controllers
 */
class CalifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $califs = Calif::paginate();

        return view('calif.index', compact('califs'))
            ->with('i', (request()->input('page', 1) - 1) * $califs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calif = new Calif();
        return view('calif.create', compact('calif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Calif::$rules);

        $calif = Calif::create($request->all());

        return redirect()->route('califs.index')
            ->with('success', 'Calif created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calif = Calif::find($id);

        return view('calif.show', compact('calif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calif = Calif::find($id);

        return view('calif.edit', compact('calif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Calif $calif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calif $calif)
    {
        request()->validate(Calif::$rules);

        $calif->update($request->all());

        return redirect()->route('califs.index')
            ->with('success', 'Calif updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $calif = Calif::find($id)->delete();

        return redirect()->route('califs.index')
            ->with('success', 'Calif deleted successfully');
    }
}
