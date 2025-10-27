<?php

namespace App\Models\laravel_crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListTask extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'list_task';
    protected $connection = 'mysql';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'status',
        'off',
    ];

    /**
     * Атрибуты, которые должны быть типизированы.
     * @var array
     */
    protected $casts = [
        'off' => 'boolean',
    ];
}
