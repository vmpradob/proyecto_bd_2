<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Intercambio;
use Illuminate\Http\Request;

class IntercambioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $intercambio = Intercambio::where('fecha', 'LIKE', "%$keyword%")
                ->orWhere('id_jugador1', 'LIKE', "%$keyword%")
                ->orWhere('id_jugador2', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $intercambio = Intercambio::paginate($perPage);
        }

        return view('intercambio.index', compact('intercambio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('intercambio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'id_jugador1' => 'required|numeric',
			'id_jugador2' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        Intercambio::create($requestData);

        return redirect('intercambio')->with('flash_message', 'Intercambio added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $intercambio = Intercambio::findOrFail($id);

        return view('intercambio.show', compact('intercambio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $intercambio = Intercambio::findOrFail($id);

        return view('intercambio.edit', compact('intercambio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'id_jugador1' => 'required|numeric',
			'id_jugador2' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        $intercambio = Intercambio::findOrFail($id);
        $intercambio->update($requestData);

        return redirect('intercambio')->with('flash_message', 'Intercambio updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Intercambio::destroy($id);

        return redirect('intercambio')->with('flash_message', 'Intercambio deleted!');
    }
}
