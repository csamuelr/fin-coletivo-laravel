<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjetoModel extends Model
{
    protected $fillable = ['idUsuario', 'titulo','descricao', 'custo', 'tempDev', 'imagem1', 'imagem2'];
    protected $guarded = ['id', 'status'];
    protected $table = 'projetos';
}
