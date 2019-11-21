<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjetoModel extends Model
{
    protected $fillable = ['descricao', 'custo', 'tempoDev', 'idUsuario'];
    protected $guarded = ['id', 'dataInicio'];
    protected $table = 'projetos';
}
