<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sewa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [] ;

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    
    public function pemesan()
    {
        return $this->belongsTo(Pemesan::class);
    }
}
