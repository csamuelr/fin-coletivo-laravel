<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjetoModel extends Model
{
    protected $fillable = ['titulo', 'descricao', 'custo', 'dataFim', 'tempoDev', 'idUsuario'];
    protected $guarded = ['id', 'dataInicio'];
    protected $table = 'projetos';
}
