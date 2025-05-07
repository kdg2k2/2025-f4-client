<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded = [];

    // type document
    public function type()
    {
        return $this->belongsTo(DocumentType::class, 'type_id');
    }
}
