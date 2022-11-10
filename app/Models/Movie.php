<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $date_of_publish
 * @property string $img
 * @property int $active
 * @property int $status
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class Movie extends Model
{
	protected $table = 'movies';
	public $timestamps = false;

	protected $casts = [
		'active' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'date_of_publish'
	];

	protected $fillable = [
		'name',
		'date_of_publish',
		'img',
		'active',
		'status'
	];
}
