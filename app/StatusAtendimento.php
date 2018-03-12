<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusAtendimento extends Model
{
    public $timestamps = false;
    protected $table = "status_atendimento";
    protected $primaryKey = 'id_status';
    protected $fillable = [
        'id','status'
    ];

    public function getId()
    {
        return $this->attributes['id_status'];
    }

    public function setId($id)
    {
        $this->attributes['id_status'] = $id;
    }
    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }
    public function chamados(){
        return $this->belongsTo('App\Chamado');
    }
}
