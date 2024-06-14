<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    public const STORAGE_LOGO_PATH = 'public/logos';
    public const MIN_LOGO_WIDTH = 100;
    public const MIN_LOGO_HEIGHT = 100;
    public const MAX_LOGO_SIZE = 5000;
    public const PAGINATE = 10;

    /**
     * @return HasMany
     */
    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Employee::class);
    }

}
