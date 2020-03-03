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

   
}
