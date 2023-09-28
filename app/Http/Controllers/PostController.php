<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        //validamos los datos ingresados con el metodo de "validate" de la clase Request
        $request->validate(['title'=>'required|max:50','body'=>'required|max:100']);
        
        // Recuperamos toda la data que es enviada por el request con el metodo "all"
        // El output es un array
        $datos = $request->all();

        //Insertamos los datos al modelo Post con el metodo estatico "create".
        Post::create($datos);

        return "hola";

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
