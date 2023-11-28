<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        try {
            $this->middleware('auth');
        } catch (\Exception $e) {
            dd("No se pudo conectar a la base de datos. Intente de nuevo en unos minutos.");
        }
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin_delete');
        $this->authorize('admin_only');
        $this->authorize('user_only');
        $users = User::all();
        return view('User/indexUser', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->trashed()) {
            $this->authorize('soft_delete');
            $user->forceDelete();
            session()->flash('success', 'El Usuario se elimino definitivamente');
            return redirect()->to('/admin/archive');
        }

        $user->delete();
        return redirect()->to('/tienda');
    }

    public function archive()
    {
        $users = User::onlyTrashed()
            ->orderBy('deleted_at', 'desc')->get();

        return view('User/archiveUser', ['users' => $users]);
    }

    public function restore(User $user, Request $request)
    {
        $this->authorize('soft_db');

        $user->restore();

        session()->flash('success', 'El usuario se restauro con exito');
        return redirect()->to('/admin/archive');
    }
}