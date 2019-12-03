<?php

namespace application\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ClassificacaoTime extends Eloquent {

	public $timestamps = false;
	protected $table = 'classificacaoTime';

    protected $fillable = [
    		'id_classificacao',
    		'id_time'
    ];

}
