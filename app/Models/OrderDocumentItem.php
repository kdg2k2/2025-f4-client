<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDocumentItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
