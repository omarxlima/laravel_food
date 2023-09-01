<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = Str::slug($request->nome);
         $this->model->create($data);

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
