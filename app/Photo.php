<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	protected $fillable = [
		'name', 'description', 'section_id', 'order'
	];

	/**
	 * Photo belongs to Section.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function section() {
		return $this->belongsTo(Section::class );
	}

	/**
	 * Photo has many Images.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function images() {
		return $this->hasMany(Image::class );
	}
}
