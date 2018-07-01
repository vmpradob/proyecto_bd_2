<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
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
            $compra = Compra::where('id_jugador', 'LIKE', "%$keyword%")
                ->orWhere('id_sobre', 'LIKE', "%$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $compra = Compra::paginate($perPage);
        }

        return view('compra.index', compact('compra'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('compra.create');
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
			'nombre' => 'required|max:20',
			'precio' => 'required|numeric',
			'cant_carta' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        Compra::create($requestData);

        return redirect('compra')->with('flash_message', 'Compra added!');
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
        $compra = Compra::findOrFail($id);

        return view('compra.show', compact('compra'));
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
        $compra = Compra::findOrFail($id);

        return view('compra.edit', compact('compra'));
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
			'nombre' => 'required|max:20',
			'precio' => 'required|numeric',
			'cant_carta' => 'required|numeric'
		]);
        $requestData = $request->all();
        
        $compra = Compra::findOrFail($id);
        $compra->update($requestData);

        return redirect('compra')->with('flash_message', 'Compra updated!');
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
        Compra::destroy($id);

        return redirect('compra')->with('flash_message', 'Compra deleted!');
    }
}
