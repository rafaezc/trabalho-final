<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestResults;

class TestResultsController extends Controller
{
    private $repository;

    public function __construct(TestResults $testResults)
    {
        $this->repository = $testResults;
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testResults = TestResults::all();
        dd($testResults);     
        return view('patients.profile', ['testResults' => $testResults]);
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
        dd($request);

        $this->repository->create($request->all());

        return redirect()->back()->with('toast_success', 'Teste cadastrado com sucesso.');
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
        $testResult_id = $request->idup;

        $testResult = TestResults::find($testResult_id);

        $testResult->update($request->all());

        return redirect()->back()->with('toast_success', 'Teste editado com sucesso.');
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

            $testResult_id = $request->iddel;

            $testResult = TestResults::find($testResult_id);
            
            $testResult->delete();
            
            return redirect()->back()->with('toast_success','Teste deletado com sucesso.');

        } else {

            return redirect()->back()->with('toast_error', 'N??o possui permiss??o para deletar testes!');
        }
    }
}