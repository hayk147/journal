<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        'description',
        'created_date'
    ];

    /**
     * Get the authors that owns the journal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'journal_author', 'journal_id', 'author_id');
    }
}
