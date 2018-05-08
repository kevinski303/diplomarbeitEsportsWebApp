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


    public function getGamesAttribute() {
        return Game::where(function($query) {
            $query->where('team1_id', $this->attributes['id'])->orWhere('team2_id', $this->attributes['id']);
        })
            ->whereNotNull('pointsteam1')
            ->count();
    }
    public function getWonAttribute() {
        return Game::whereNotNull('pointsteam1')
            ->where(function($query) {
                $query->where(function($query2) {
                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('pointsteam1 > pointsteam2');
                })->orWhere(function($query2) {
                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('pointsteam1 < pointsteam2');
                });
            })
            ->count();
    }
    public function getTiedAttribute() {
        return Game::whereNotNull('pointsteam1')
            ->whereRaw('pointsteam1 = pointsteam2')
            ->where(function($query) {
                $query->where('team1_id', $this->attributes['id'])
                    ->orWhere('team2_id', $this->attributes['id']);
            })
            ->count();
    }
    public function getLostAttribute() {
        return Game::whereNotNull('pointsteam1')
            ->where(function($query) {
                $query->where(function($query2) {
                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('pointsteam1 < pointsteam2');
                })->orWhere(function($query2) {
                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('pointsteam1 > pointsteam2');
                });
            })
            ->count();
    }
    public function getPointsAttribute() {
        return $this->getWonAttribute() * 3 + $this->getTiedAttribute() * 1;
    }
}
