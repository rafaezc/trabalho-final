<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Patient;
class ScheduleController extends Controller
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
    public function index()
    {
        $schedules = Schedule::where('data_hora', '>', date('Y-m-d h:i:S'))->orderby('data_hora', 'asc')->paginate(20); 

        $usernames = User::all();

        $patientnames = Patient::all();
        
        return view('schedules', ['schedules' => $schedules, 'usernames' => $usernames, 'patientnames' => $patientnames]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexold()
    {
        $schedulesOlds = Schedule::where('data_hora', '<', date('Y-m-d h:i:S'))->orderby('data_hora', 'asc')->paginate(20);

        $usernamesOlds = User::all();

        $patientnamesOlds = Patient::all();

        return view('pastschedules', ['schedulesOlds' => $schedulesOlds, 'usernamesOlds' => $usernamesOlds, 'patientnamesOlds' => $patientnamesOlds]);
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
        $schedules = Schedule::all(); 

        if (!$schedules->contains('paciente_id', $request->paciente_id) 
        && !$schedules->contains('usuario_id', $request->usuario_id) 
        && !$schedules->contains('data_hora', $request->data_hora)) {
            
            if ($request->anotacoes == '') {

                $this->repository->create($request->except('anotacoes'));

            } else if ($request->conclusoes == '') {

                $this->repository->create($request->except('conclusoes'));

            } else {

                $this->repository->create($request->all());
            }

            return redirect()->back()->with('toast_success', 'Sess??o cadastrada com sucesso.');

        } else {

            return redirect()->back->with('toast_info', 'Tentativa de cadastro com dados duplicados!');
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
        $schedule_id = $request->idup;

        $schedule = Schedule::find($schedule_id);

        $schedules = Schedule::where('id', '!=', $schedule_id)->get();

        if (!$schedules->contains('paciente_id', $request->paciente_id) 
        || !$schedules->contains('usuario_id', $request->usuario_id) 
        || !$schedules->contains('data_hora', $request->data_hora)) {
            
            if ($request->anotacoes == '') {
                
                $schedule->update($request->except('anotacoes'));

            } else if ($request->conclusoes == '') {
                
                $schedule->update($request->except('conclusoes'));
            } else {
                
                $schedule->update($request->all());
            }

            return redirect()->back()->with('toast_success', 'Sess??o editada com sucesso.');

        } else {

            return redirect()->back()->with('toast_info', 'Tentativa de edi????o com dados duplicados!');
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
        $schedule_id = $request->iddel;

        $schedule = Schedule::find($schedule_id);

            if ($schedule->anotacoes == '' && $schedule->conclusoes == '') {
                
                $schedule->delete();

                return redirect()->back()->with('toast_success', 'Sess??o deletada com sucesso');
        
            } else {

                return redirect()->back()->with('toast_error', 'N??o ?? permitido deletar uma sess??o j?? atendida!');
            }
    }
}
