<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\TestResults;
use App\Models\Test;
use App\Models\User;

class PatientController extends Controller
{
    private $repository;

    public function __construct(Patient $patient)
    {
        $this->repository = $patient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   
        $filter = $request->except('_token');

        if (!is_null($request->search)) {
            $patients = Patient::where('nome', 'LIKE', "%{$request->search}%")
                                ->orwhere('cpf', 'LIKE', "%{$request->search}%")
                                ->paginate(20);

            return view('patients', ['patients' => $patients, 'filter' => $filter]);
            
        } else {

            return view('patients', ['patients' => '']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
        $patients = Patient::all();

        if (!$patients->contains('nome', $request->nome) 
        && !$patients->contains('cpf', $request->cpf)) {
                
            $request['usuario_id'] = session()->get('user_id'); 
            
            $this->repository->create($request->all());

            return redirect()->route('patients.search')->with('toast_success', 'Paciente cadastrado com sucesso.');

        } else {

            return redirect()->route('patients.search')->with('toast_info', 'Tentativa de cadastro com dados duplicados!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storetestorschedule(Request $request, $id) 
    {
        $schedule = Schedule::find($id);

        $tests = Test::find($request->teste_id)->schedules()->attach($schedule->id, ['data' => $schedule->data_hora, 'percentil' => $request->percentil, 'comentario' => $request->comentario]);

        return redirect()->route('patients.show', $schedule->paciente_id)->with('toast_success', 'Teste adicionado à sessão com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        $userProfNames = User::all();

        $patientSchedules = Schedule::where('paciente_id', '=', $id)->orderby('data_hora', 'asc')->get();

        $patientScheduleTests = Test::all();

        // $test->pivot-> substituir todos os pivot

        $testResults = TestResults::all();

        // dd($testResults);
        
        // foreach ($tests as $test) {
        //     dd($test->pivot);
        // }

        return view('patients.profile', ['patient' => $patient, 'patientSchedules' => $patientSchedules, 'userProfNames' => $userProfNames, 'patientScheduleTests' => $patientScheduleTests, 'testResults' => $testResults]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function showtestorschedule($id)
    // {

    //     // return view('patients.profile', ['patient' => $patient, 'patientSchedules' => $patientSchedules, 'userProfNames' => $userProfNames, 'patientScheduleTests' => $patientScheduleTests, 'schedules' => $schedules]);
    // }

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
    public function updatetestorschedule(Request $request, $id) 
    {
        // dd($request->percentil);
        $schedule = Schedule::find($id);

        $tests = Test::find($request->teste_id)->schedules()->updateExistingPivot($schedule->id, ['data' => $schedule->data_hora, 'percentil' => $request->percentil, 'comentario' => $request->comentario ]);

        return redirect()->route('patients.show', $schedule->paciente_id)->with('toast_success', 'Resultado do teste editado com sucesso.');
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
        
        $patient = Patient::find($id);
        
        $patients = Patient::where('id', '!=', $id)->get();

        if (!$patients->contains('nome', $request->nome) 
        && !$patients->contains('cpf', $request->cpf)) {
            
            $request['usuario_id'] = session()->get('user_id'); 

            $patient->update($request->all());

            return redirect()->route('patients.show', $patient->id)->with('toast_success', 'Paciente editado com sucesso.');

        } else {

            return redirect()->route('patients.show', $patient->id)->with('toast_info', 'Tentativa de edição com dados duplicados!');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (session()->get('user_code') != 'S1') { 

            $patient = Patient::find($id);

            $request['status'] = "INATIVO";

            $patient->update($request->only('status'));

            return redirect()->route('patients.search')->with('toast_success', 'Paciente deletado com sucesso.');
        
        } else {

            return redirect()->route('patients.search')->with('toast_error', 'Não possui permissão para deletar pacientes!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletetestorschedule(Request $request, $id) 
    {
        $schedule = Schedule::find($id);

        dd($request->teste_id);
        
        if (session()->get('user_code') != 'S1') {

            $schedule->tests()->detach($request->teste_id);

            return redirect()->route('patients.show', $schedule->paciente_id)->with('toast_success', 'Teste deletado da sessão com sucesso.');
        
        } else {

            return redirect()->route('patients.show', $schedule->paciente_id)->with('toast_error', 'Não possui permissão para deletar resultados dos testes');
        }
    }
}
