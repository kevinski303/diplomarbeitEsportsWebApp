<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mode
 *
 * @package App
 * @property string $tournamentmode
*/
class Mode extends Model
{
    use SoftDeletes;

    protected $fillable = ['tournamentmode'];
    protected $hidden = [];
    
    
    
}
