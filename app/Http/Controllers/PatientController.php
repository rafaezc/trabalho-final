<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
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
        if (!is_null($request->search)) {
            $patients = Patient::where('nome', 'LIKE', "%{$request->search}%")
                                ->orwhere('cpf', 'LIKE', "%{$request->search}%")
                                ->paginate(25);
            return view('patients', ['patients' => $patients]);
        } else {
            return redirect()->route('patients.index');
        }
        // dd($request->search);
        // return view('patients', ['patients' => $patients]);
        // return view('patients.index', compact('patients'));
    }

    public function index()
    {
        $patients = '';
        // Patient::all();
        // $usernames = User::pluck('nome', 'id');     
        return view('patients', ['patients' => $patients]);
        // 'usernames' => $usernames
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
        $this->repository->create($request->all());
        // dd($request->all());
        return redirect()->route('patients.show');
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
        return view('patients.profile', ['patient' => $patient]);
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
        $patient_id = $request->idup;
        $patient = Patient::find($patient_id);
        // dd($request->all());
        $patient->update($request->all());
        return redirect()->route('patients.show', $patient->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $patient_id = $request->iddel;
        $patient = Patient::find($patient_id);
        $patient->delete();
        return redirect()->route('patients.search');
    }

}

