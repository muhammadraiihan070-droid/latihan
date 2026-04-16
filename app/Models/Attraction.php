<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    //WAJIB: Daftarkan kolom yang boleh diisi
    protected $fillable = [
        'destination_id',
        'nama',
        'description',

    ];

    public function destination()
    {
        return $this->belongsTo( Destination::class );
    }

    
}
