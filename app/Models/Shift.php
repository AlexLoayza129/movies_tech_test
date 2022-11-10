<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shift
 * 
 * @property int $id
 * @property Carbon $time
 * @property string $movie_name
 * @property int $active
 * @property int $status
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class Shift extends Model
{
	protected $table = 'shifts';
	public $timestamps = false;

	protected $casts = [
		'active' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'time',
		'movie_name',
		'active',
		'status'
	];
}
