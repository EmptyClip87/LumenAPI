<?php
/**
 * Created by PhpStorm.
 * User: empty
 * Date: 5/13/2018
 * Time: 01:54
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'twitter', 'linkedin', 'lastArticleDate'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [];
}