<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    private $repository;

    public function __construct(Test $test)
    {
        $this->repository = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::paginate(10);     
        return view('tests', ['tests' => $tests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $tests = Test::all();

        if (!$tests->contains('nome', $request->nome)
        && !$tests->contains('descricao', $request->descricao)) {

            $this->repository->create($request->all());

            return redirect()->back()->with('toast_success', 'Teste cadastrado com sucesso.');

        } else {

            return redirect()->back()->with('toast_info', 'Tentativa de cadastro com dados duplicados!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $test_id = $request->idup;

        $test = Test::find($test_id);
        
        $tests = Test::where('id', '!=', $test_id)->get();

        if (!$tests->contains('nome', $request->nome)
        || !$tests->contains('descricao', $request->descricao)) {

            $test->update($request->all());

            return redirect()->back()->with('toast_success', 'Teste editado com sucesso.');

        } else {

            return redirect()->back()->with('toast_info', 'Tentativa de edição com dados duplicados!');;
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
        if (session()->get('user_code') != 'S1') {

            $test_id = $request->iddel;

            $test = Test::find($test_id);
            
            $test->delete();
            
            return redirect()->back()->with('toast_success','Teste deletado com sucesso.');

        } else {

            return redirect()->back()->with('toast_error', 'Não possui permissão para deletar testes!');
        }
    }
}
