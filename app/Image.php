<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $fillable = [
		'product_id', 'path', 'active', 'order'
	];

	/**
	 * Image belongs to Photo.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function photo() {
		return $this->belongsTo(Photo::class );
	}
}
