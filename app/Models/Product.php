<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'author_name',
        'material',
        'category',
        'height',
        'width',
        'length',
        'is_customable',
        'imageURL'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'uploaded_date' => 'datetime',
    ];

    /*
     * Get the user that owns the produc
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_name', 'name');
    }

}
