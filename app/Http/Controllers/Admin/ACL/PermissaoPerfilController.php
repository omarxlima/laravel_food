<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\{
    Perfil,
    Permissao
};
use Illuminate\Http\Request;

class PermissaoPerfilController extends Controller
{
    protected $perfil, $permissao;

    public function __construct(Perfil $perfil, Permissao $permissao)
    {
        $this->perfil = $perfil;
        $this->permissao = $permissao;
    }

    public function permissoes($idPerfil)
    {
        $perfil =  $this->perfil->find($idPerfil);
        if(!$perfil) {
            return redirect()->back();
        }
        $permissoes = $perfil->permissoes()->paginate();


        return view('admin.perfis.permissoes.permissoes', compact('perfil', 'permissoes'));

    }
}
