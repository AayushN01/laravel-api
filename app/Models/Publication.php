<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;

class Publication extends Model
{
    use HasFactory;

    protected $table = "publications";

    protected $fillable = [
        'publication_name',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
