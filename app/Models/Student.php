<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function payment_records()
    {
        return $this->hasMany(PaymentRecords::class);
    }

    public function imageUrl()
    {
        return $this->image
            ? Storage::disk('images')->url($this->image)
            : asset('img/users/avatar.png');
    }

}
