<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();     
        return view('users', ['users' => $users]);
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
        $users = User::all();

        if (!$users->contains('nome', $request->nome) 
        && !$users->contains('email', $request->email) 
        && !$users->contains('numero_conselho', $request->numero_conselho)) {

            $this->repository->create($request->all());
            // dd($request->all());
            return redirect()->route('users.index')->with('toast_success', 'Usuário cadastrado com sucesso.');

        } else {

            return redirect()->route('users.index')->with('toast_info', 'Tentativa de cadastro com dados duplicados!');
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

        $user_id = $request->idup;
        $user = User::find($user_id);

        $users = User::where('id', '!=', $user_id)->get();

        if (!$users->contains('nome', $request->nome) 
        && !$users->contains('email', $request->email) 
        && !$users->contains('numero_conselho', $request->numero_conselho)) {

            if ($request->senha == '') {
                $user->update($request->except('senha'));
            } else {
                $user->update($request->all());
            }

            return redirect()->route('users.index')->with('toast_success', 'Usuário editado com sucesso.');

        } else {

            return redirect()->route('users.index')->with('toast_info', 'Tentativa de edição com dados duplicados!');
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
        $user_id = $request->iddel;
        $user = User::find($user_id);
        $user->delete();
        return redirect()->route('users.index')->with('toast_success', 'Usuário deletado com sucesso.');
    }

}
