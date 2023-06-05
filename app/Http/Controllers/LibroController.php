<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate();

        return view('libro.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        $categorias = Categoria::pluck('nombre','id');
        return view('libro.create', compact('libro','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Libro::$rules);
    
        $libro = Libro::create($request->all());
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $ubicacion = public_path('imagenes');
            $imagen->move($ubicacion, $nombreImagen);
            
            $libro->ruta = 'imagenes/' . $nombreImagen;
            $libro->save();
        }
    
        return redirect()->route('libros.index')
            ->with('success', 'Libro created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);

        return view('libro.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);

        $categorias = Categoria::pluck('nombre','id');
        

        return view('libro.edit', compact('libro','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->nombre = $request->input('nombre');
        $libro->categoria_id = $request->input('categoria_id');
    
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $ubicacion = public_path('imagenes');
            $imagen->move($ubicacion, $nombreImagen);
            
            $libro->ruta = 'imagenes/' . $nombreImagen;
        }
    
        $libro->save();
    
        return redirect()->route('libros.index')
            ->with('success', 'Libro updated successfully');
    }
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro deleted successfully');
    }
}
