<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	protected $fillable = [
		'name', 'description', 'type_id', 'section_id', 'order', 'url'
	];

	/**
	 * Video belongs to Secrtion.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function section() {
		return $this->belongsTo(Section::class );
	}
}
