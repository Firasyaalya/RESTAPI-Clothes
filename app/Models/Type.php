<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'number';

    protected $table = 'type_clothes';

    protected $fillable = ['name_clothes', 'type_clothes', 'price', 'seller', 'image'];

    public function dealers(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller', 'id');
    }

}
