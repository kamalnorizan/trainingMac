<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cert extends Model
{
   public $timestamps = true;

   protected $table = 'certs';

   protected $primaryKey = 'id';

   public $incrementing = true;

   protected $guarded = ['id'];

   public function childOfFather()
   {
       return $this->belongsTo('App\User', 'ic_bapa', 'ic_number');
   }

   public function childOfMother()
   {
       return $this->belongsTo('App\User', 'ic_ibu', 'ic_number');
   }

   public function tboas()
   {
       return $this->hasMany('App\Tboa', 'cert_id', 'id');
   }
}
