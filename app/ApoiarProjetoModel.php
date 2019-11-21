<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApoiarProjetoModel extends Model
{
    protected $fillable = ['valor', 'idProjeto', 'idApoiador'];
    protected $guarded = ['id'];
    protected $table = 'apoiar_projetos';
}
