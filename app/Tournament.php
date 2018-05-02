<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tournament
 *
 * @package App
 * @property string $name
 * @property string $beginn
 * @property string $end
 * @property tinyInteger $public
 * @property string $tournamentmode
 * @property string $streamlink
 * @property string $winner
*/
class Tournament extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'beginn', 'end', 'public', 'streamlink', 'tournamentmode_id', 'winner_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBeginnAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['beginn'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
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
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEndAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['end'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['end'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEndAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTournamentmodeIdAttribute($input)
    {
        $this->attributes['tournamentmode_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setWinnerIdAttribute($input)
    {
        $this->attributes['winner_id'] = $input ? $input : null;
    }
    
    public function tournamentmode()
    {
        return $this->belongsTo(Mode::class, 'tournamentmode_id')->withTrashed();
    }
    
    public function winner()
    {
        return $this->belongsTo(Team::class, 'winner_id')->withTrashed();
    }
    
}
