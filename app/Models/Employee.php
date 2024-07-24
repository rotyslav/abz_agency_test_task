<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position_id',
        'email',
        'phone',
        'salary',
        'date_of_employment',
        'headmen_id',
    ];

    public function headmen(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'headmen_id', 'id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'headmen_id', 'id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
