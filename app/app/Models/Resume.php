<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resume extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function storedResume()
    {
        return $this->morphOne(FileModel::class, 'fileable');
    }
}
