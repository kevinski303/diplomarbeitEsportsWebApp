<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Game
 *
 * @package App
 * @property string $beginn
 * @property string $tournament
 * @property string $team1
 * @property string $team2
 * @property integer $pointsteam1
 * @property integer $pointsteam2
*/
class Game extends Model
{
    use SoftDeletes;

    protected $fillable = ['beginn', 'pointsteam1', 'pointsteam2', 'tournament_id', 'team1_id', 'team2_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBeginnAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['beginn'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['beginn'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBeginnAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTournamentIdAttribute($input)
    {
        $this->attributes['tournament_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTeam1IdAttribute($input)
    {
        $this->attributes['team1_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTeam2IdAttribute($input)
    {
        $this->attributes['team2_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPointsteam1Attribute($input)
    {
        $this->attributes['pointsteam1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPointsteam2Attribute($input)
    {
        $this->attributes['pointsteam2'] = $input ? $input : null;
    }
    
    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id')->withTrashed();
    }
    
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id')->withTrashed();
    }
    
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id')->withTrashed();
    }
    
}
