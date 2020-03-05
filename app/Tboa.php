<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tboa extends Model
{
    public $timestamps = true;

    protected $table = 'tboa';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function cert()
    {
        return $this->belongsTo('App\Cert', 'cert_id', 'id');
    }

}
