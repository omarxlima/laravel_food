<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlanoDetalhe;
use App\Models\Plano;
use App\Models\PlanoDetalhe;
use Illuminate\Http\Request;

class PlanoDetalheController extends Controller
{
    private $model, $plano;

    public function __construct(PlanoDetalhe $detalhe, Plano $plano)
    {
        $this->model = $detalhe;
        $this->plano = $plano;
    }
    public function index($urlPlano)
    {
        if (!$plano = $this->plano->where('url', $urlPlano)->first()) {
            return redirect()->back();
        }
        $detalhes = $plano->detalhes()->paginate();
        return view('admin.planos.detalhes.index', compact('plano', 'detalhes'));
    }


    public function create($urlPlano)
    {
        if (!$plano = $this->plano->where('url', $urlPlano)->first()) {
            return redirect()->back();
        }
        return view('admin.planos.detalhes.create', compact('plano'));
    }


    public function store(StoreUpdatePlanoDetalhe $request, $urlPlano)
    {
        if (!$plano = $this->plano->where('url', $urlPlano)->first()) {
            return redirect()->back();
        }

        $plano->detalhes()->create($request->all());

        return redirect()->route('detalhes.index', $plano->url);
    }


    public function show(string $urlPlano, string $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->model->find($idDetalhe);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        return view('admin.planos.detalhes.show', compact('plano', 'detalhe'));
    }


    public function edit(string $urlPlano, string $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->model->find($idDetalhe);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        return view('admin.planos.detalhes.edit', compact('plano', 'detalhe'));
    }


    public function update(StoreUpdatePlanoDetalhe $request, string $urlPlano, $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->model->find($idDetalhe);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }
        $detalhe->update($request->all());
        return redirect()->route('detalhes.index', $plano->url);
    }


    public function destroy(string $urlPlano, string $idDetalhe)
    {
        $plano = $this->plano->where('url', $urlPlano)->first();
        $detalhe = $this->model->find($idDetalhe);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }
        $detalhe->delete();
        return redirect()
                ->route('detalhes.index', $plano->url)
                ->with('message', 'Registro excluido com sucesso!');

    }
}
