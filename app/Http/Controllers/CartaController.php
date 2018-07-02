<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Carta;
use Illuminate\Http\Request;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $carta = Carta::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('imgUrl', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $carta = Carta::paginate($perPage);
        }

        return view('carta.index', compact('carta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('carta.create');
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
			'nombre' => 'required'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('imgUrl')) {

            $file = $request->file('imgUrl');
                $uploadPath = public_path('/uploads/imgUrl');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['imgUrl'] = $fileName;
        }

        $carta = Carta::create($requestData);
        /** @var Carta $carta */
        $carta->clases()->sync($request->get('clases'));
        return redirect('carta')->with('flash_message', 'Carta added!');
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
        $cartum = Carta::findOrFail($id);

        return view('carta.show', compact('cartum'));
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
        $cartum = Carta::findOrFail($id);

        return view('carta.edit', compact('cartum'));
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
			'nombre' => 'required'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('imgUrl')) {
                $file = $request->file('imgUrl');
                $uploadPath = public_path('/uploads/imgUrl');
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['imgUrl'] = $fileName;
        }

        /** @var Carta $cartum */
        $cartum = Carta::findOrFail($id);
        $cartum->clases()->sync($request->get('clases'));
        $cartum->update($requestData);

        return redirect('carta')->with('flash_message', 'Carta updated!');
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
        Carta::destroy($id);

        return redirect('carta')->with('flash_message', 'Carta deleted!');
    }
}
