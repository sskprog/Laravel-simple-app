<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'email', 'phone', 'company_id'];

    public function company()
    {
        return $this->BelongsTo(Company::class);
    }
}
