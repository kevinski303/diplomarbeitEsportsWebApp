<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Team
 *
 * @package App
 * @property string $name
 * @property string $shortname
 * @property string $twitterlink
 * @property string $streamlink
 * @property string $www
 * @property string $logo
*/
class Team extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'shortname', 'twitterlink', 'streamlink', 'www', 'logo'];
    protected $hidden = [];
    
    
    
}
