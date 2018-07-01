<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
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
            $clase = Clase::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('precio_c', 'LIKE', "%$keyword%")
                ->orWhere('precio_v', 'LIKE', "%$keyword%")
                ->orWhere('probabilidad', 'LIKE', "%$keyword%")
                ->orWhere('imgUrl', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $clase = Clase::paginate($perPage);
        }

        return view('clase.index', compact('clase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clase.create');
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
			'precio_c' => 'required',
			'precio_v' => 'required',
			'probabilidad' => 'required|numeric'
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

        Clase::create($requestData);

        return redirect('clase')->with('flash_message', 'Clase added!');
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
        $clase = Clase::findOrFail($id);

        return view('clase.show', compact('clase'));
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
        $clase = Clase::findOrFail($id);

        return view('clase.edit', compact('clase'));
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
			'precio_c' => 'required',
			'precio_v' => 'required',
			'probabilidad' => 'required|numeric'
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

        $clase = Clase::findOrFail($id);
        $clase->update($requestData);

        return redirect('clase')->with('flash_message', 'Clase updated!');
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
        Clase::destroy($id);

        return redirect('clase')->with('flash_message', 'Clase deleted!');
    }
}
