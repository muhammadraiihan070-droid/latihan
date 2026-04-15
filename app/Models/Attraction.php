<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    //WAJIB: Daftarkan kolom yang boleh diisi
    protected $fillable = ['nama','description'];
}
