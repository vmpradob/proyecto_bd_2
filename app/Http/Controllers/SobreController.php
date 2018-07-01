<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sobre;
use Illuminate\Http\Request;

class SobreController extends Controller
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
            $sobre = Sobre::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('precio', 'LIKE', "%$keyword%")
                ->orWhere('cant_cartas', 'LIKE', "%$keyword%")
                ->orWhere('imgUrl', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $sobre = Sobre::paginate($perPage);
        }

        return view('sobre.index', compact('sobre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sobre.create');
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
        

        if ($request->hasFile('imgUrl')) {

            $file = $request->file('imgUrl');
                $uploadPath = public_path('/uploads/imgUrl');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['imgUrl'] = $fileName;
        }

        Sobre::create($requestData);

        return redirect('sobre')->with('flash_message', 'Sobre added!');
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
        $sobre = Sobre::findOrFail($id);

        return view('sobre.show', compact('sobre'));
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
        $sobre = Sobre::findOrFail($id);

        return view('sobre.edit', compact('sobre'));
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
        

        if ($request->hasFile('imgUrl')) {

            $file = $request->file('imgUrl');
                $uploadPath = public_path('/uploads/imgUrl');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['imgUrl'] = $fileName;
        }

        $sobre = Sobre::findOrFail($id);
        $sobre->update($requestData);

        return redirect('sobre')->with('flash_message', 'Sobre updated!');
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
        Sobre::destroy($id);

        return redirect('sobre')->with('flash_message', 'Sobre deleted!');
    }
}
