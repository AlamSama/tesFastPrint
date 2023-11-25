<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function status(){
        return $this->belongsTo(status::class);
    }
}
