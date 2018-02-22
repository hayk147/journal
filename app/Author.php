<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'father_land',
    ];

    /**
     * Get the journals that belong to the author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function journals()
    {
        return $this->belongsToMany('App\Journal', 'journal_author', 'author_id', 'journal_id');
    }
}
