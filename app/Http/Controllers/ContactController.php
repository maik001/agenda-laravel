<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $data = Contact::all();
        return Inertia::render('Home', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inserir()
    {
        return Inertia::render('Inserir');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([

            'name' => ['required', 'max:50'],

            'email' => ['required', 'max:50', 'email'],

            'cellphone' => ['required', 'min:10']

        ]);
        

        Contact::create($request->toArray());


        return Redirect::route('Home')->with('message', 'Contato criado com sucesso!');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $request->validate([

            'name' => ['required', 'max:50'],

            'email' => ['required', 'max:50', 'email'],

            'cellphone' => ['required', 'min:10']
        ]);

        if ($request->has('id')) {

            Contact::find($request->input('id'))->update($request->all());
    
            return Redirect::route('Home')->with('message', 'Contato Atualizado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {

            Contact::find($request->input('id'))->delete();

            return Redirect::route('Home')->with('message', 'Contato Deletado com sucesso!');
        }
    }
}
