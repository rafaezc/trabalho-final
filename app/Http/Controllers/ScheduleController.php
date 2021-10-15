<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Patient;
use App\Models\TestResults;

// Deixar o controller da agenda rodando liso
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
        // dd($schedules);    
        return view('schedules', ['schedules' => $schedules, 'usernames' => $usernames, 'patientnames' => $patientnames]);
    }

    public function indexold()
    {
        $schedulesOlds = Schedule::where('data_hora', '<', date('Y-m-d h:i:S'))->orderby('data_hora', 'asc')->paginate(20);

        $usernamesOlds = User::all();

        $patientnamesOlds = Patient::all();
        // dd($patientnames);    
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

            return redirect()->route('scheules.index')->with('toast_success', 'Sessão cadastrada com sucesso.');

        } else {

            return redirect()->route('schedules.index')->with('toast_info', 'Tentativa de cadastro com dados duplicados!');
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
                // dd($request);
                $schedule->update($request->except('anotacoes'));
            } else if ($request->conclusoes == '') {
                // dd($request);
                $schedule->update($request->except('conclusoes'));
            } else {
                // dd($request);
                $schedule->update($request->all());
            }

            return redirect()->route('schedules.index')->with('toast_success', 'Sessão editada com sucesso.');

        } else {

            return redirect()->route('schedules.index')->with('toast_info', 'Tentativa de edição com dados duplicados!');
        }
    }

    public function attachtTestsToSchedule()
    {
        $data = ['attribute'=>'value']; //replace this with the data you want to insert 
        $check = TestResults::findOrFail(5);
        $check->events()->attach(2, $data);
        return $check->events();
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
        $schedule->delete();
        return redirect()->route('schedules.index')->with('toast_success', 'Sessão deletada com sucesso');
    }
}
