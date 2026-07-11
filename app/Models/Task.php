<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enum\Task\TaskStatus;

/**
 * @property string $uuid
 * @property string $title
 * @property string $description
 * @property string $user_id
 * @property string $status
 */
class Task extends Model
{
    use HasUuids;
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['title',
        'description',
        'user_id',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'status' => TaskStatus::class,
        ];
    }


}
