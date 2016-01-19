<?php namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at'
	];

	protected $dates = ['published_at'];

	public function scopePublished($query) {
		$query->where('published_at', '<=', Carbon::now());
	}
	

	// UNPUBLISHED
	// public function scopeUnpublished($query) {
	// 	$query->where('published_at', '>', Carbon::now());
	// }
	

	//setNameAttribute
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::parse($date);
	}


}
