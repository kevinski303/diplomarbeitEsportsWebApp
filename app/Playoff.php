<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Playoff
 *
 * @package App
 * @property string $playofftournament
 * @property string $seasontournament
*/
class Playoff extends Model
{
    use SoftDeletes;

    protected $fillable = ['playofftournament_id', 'seasontournament_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPlayofftournamentIdAttribute($input)
    {
        $this->attributes['playofftournament_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSeasontournamentIdAttribute($input)
    {
        $this->attributes['seasontournament_id'] = $input ? $input : null;
    }
    
    public function playofftournament()
    {
        return $this->belongsTo(Tournament::class, 'playofftournament_id')->withTrashed();
    }
    
    public function seasontournament()
    {
        return $this->belongsTo(Tournament::class, 'seasontournament_id')->withTrashed();
    }
    
}
