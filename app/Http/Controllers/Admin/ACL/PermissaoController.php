<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermissao;
use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{

    private $model;
    public function __construct(Permissao $permissao)
    {
        $this->model = $permissao;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissoes = $this->model->paginate();
        return view('admin.permissoes.index', compact('permissoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePermissao $request)
    {
        $this->model->create($request->all());
        return redirect()->route('permissoes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permissao = $this->model->find($id);
        if(!$permissao){
            return redirect()->back();
        }
        return view('admin.permissoes.show', compact('permissao'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissao = $this->model->find($id);
        if(!$permissao){
            return redirect()->back();
        }
        return view('admin.permissoes.edit', compact('permissao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePermissao $request, string $id)
    {
        $permissao = $this->model->find($id);
        if(!$permissao){
            return redirect()->back();
        }
        $permissao->update($request->all());
        return redirect()->route('permissoes.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permissao = $this->model->find($id);
        if(!$permissao){
            return redirect()->back();
        }
        $permissao->delete();
        return redirect()->route('permissoes.index');
    }
}
