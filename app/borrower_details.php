<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class borrower_details extends Model
{
   protected $fillable = ["item[]","qty[]","sn[]"];
}
