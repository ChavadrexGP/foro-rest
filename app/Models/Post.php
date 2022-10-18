?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'message', 'user_id', 'topic_id', 'date'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}