<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'path',
    ];

    // type document
    public function type()
    {
        return $this->belongsTo(DocumentType::class, 'type_id');
    }

    // document download
    public function downloads()
    {
        return $this->hasMany(DocumentDownload::class, 'document_id');
    }
}
