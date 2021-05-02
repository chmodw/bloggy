<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Set the tag name
     *
     * @param $name
     * @return void
     */
    public function setName($value)
    {
        // removes spaces from both ends.
        $this->attributes['name'] = trim($value);
    }
}
