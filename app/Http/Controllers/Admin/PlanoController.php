<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanoRequest;
use App\Models\Plano;
use Illuminate\Http\Request;

class PlanoController extends Controller
{
    private $model;
   public function __construct(Plano $plano) {
        $this->model = $plano;

   }
    public function index()
    {
        $planos = $this->model->latest()->paginate();
        return view('admin.planos.index', compact('planos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.planos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePlanoRequest $request)
    {
         $this->model->create($request->all());

        return redirect()->route('planos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        $plano = $this->model->where('url', $url)->first();
            if (!$plano){
                return redirect()->back();
            }
        return view('admin.planos.show', compact('plano'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $url)
    {
        $plano = $this->model->where('url', $url)->first();
        if (!$plano){
            return redirect()->back();
        }
        return view('admin.planos.edit', compact('plano'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePlanoRequest $request, string $url)
    {
        $plano = $this->model->where('url', $url)->first();
        if (!$plano){
            return redirect()->back();
        }

        $plano->update($request->all());
        return redirect()->route('planos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $url)
    {
        $plano = $this->model->where('url', $url)->first();
        if (!$plano){
            return redirect()->back();
        }

        $plano->delete();

        return redirect()->route('planos.index', 'Excluído com sucesso!');
    }

    public function pesquisa(Request $request) {
        $filtros = $request->except('_token');
        $planos = $this->model->pesquisa($request->filtro);
        return view('admin.planos.index', compact('planos','filtros'));
    }
}
