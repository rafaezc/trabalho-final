<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Patient;
use App\Models\Test;

class TestResultsController extends Controller
{
    private $repository;

    public function __construct(Schedule $schedule)
    {
        $this->repository = $schedule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $schedule = $this->repository->find($id);
        $testResults = $schedule->testsResultsSchedule()->get();
        dd($testResults);
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
        // dd($request);
        $this->repository->create($request->all());

        return redirect()->route('patients.show')->with('toast_success', 'Resultado do teste adicionado com sucesso.');
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
    public function update(Request $request, $id)
    {
        $schedule = $this->repository->find($id);
        $testResults = $schedule->testsResultsSchedule()->get();
            
        // dd($testResults);
        // dd($request->all());
        $testResults->update($request->all());

        return redirect()->route('patients.show')->with('toast_success', 'Resultado do teste editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $schedule = $this->repository->find($id);
        $testResults = $schedule->testsResultsSchedule()->get();
        $testResults->delete();
        return redirect()->route('patients.show')->with('toast_success', 'Teste deletado com sucesso.');
    }
    
}
