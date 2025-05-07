<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected const StatusText = [
        'pending' => 'Chờ thanh toán',
        'paid' => 'Đã thanh toán',
        'cancelled' => 'Đã hủy',
        'completed' => 'Hoàn thành',
    ];

    public function packageItems()
    {
        return $this->hasMany(OrderPackageItem::class, 'order_id');
    }
    public function documentItems()
    {
        return $this->hasMany(OrderDocumentItem::class, 'order_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function downloadItems() {
        return $this->hasMany(DocumentDownload::class, 'order_id');
    }
}
