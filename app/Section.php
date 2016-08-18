<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	protected $fillable = [
		'name', 'type_id', 'order', 'type_view', 'active', 'section_id',
	];

	/**
	 * Section belongs to Type.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type() {
		// belongsTo(RelatedModel, foreignKey = type_id, keyOnRelatedModel = id)
		return $this->belongsTo(Type::class );
	}
	/**
	 * Section has many Photos.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function photos() {
		return $this->hasMany(Photo::class )->orderBy('order', 'asc');
	}

	/**
	 * Section has many Videos.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function videos() {
		return $this->hasMany(Video::class )->orderBy('order', 'asc');
	}

	/**
	 * Section has many Videos.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function subSections() {
		return $this->hasMany(Section::class )->orderBy('order', 'asc');
	}

	/**
	 * Section blongs to Videos.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function parent() {
		return $this->belongsTo(Section::class );
	}
}
