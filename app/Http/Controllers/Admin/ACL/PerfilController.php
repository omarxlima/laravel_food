<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePerfil;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    private $model;
    public function __construct(Perfil $perfil) {
        $this->model = $perfil;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfis = $this->model->paginate();

        return view('admin.perfis.index', compact('perfis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.perfis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePerfil $request)
    {
        $this->model->create($request->all());

        return redirect()->route('perfis.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perfil = $this->model->find($id);
        if (!$perfil){
            return redirect()->back();
        }
    return view('admin.perfis.show', compact('perfil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $perfil = $this->model->find($id);
        if (!$perfil){
            return redirect()->back();
        }
    return view('admin.perfis.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePerfil $request, string $id)
    {
        $perfil = $this->model->find($id);
        if (!$perfil){
            return redirect()->back();
        }
        $perfil->update($request->all());
        return redirect()->route('perfis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perfil = $this->model->find($id);
        if (!$perfil){
            return redirect()->back();
        }
        $perfil->delete();
        return redirect()->route('perfis.index');

    }

      /**
     * pesquisa.
     */
    public function pesquisa(Request $request)
    {
        $filtros = $request->only('filtro');
        $perfis = $this->model
                        ->where(function($query) use ($request) {
                                if($request->filter) {
                                    $query->where('nome', $request->filtro);
                                    $query->orwhere('descricao', 'LIKE' ,"%{$request->filtro}%");
                                }

                        })->paginate();

        return view('admin.perfis.index', compact('perfis', 'filtros'));
    }
}
