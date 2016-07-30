<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowFlag extends Model
{
  public $primaryKey = 'mal_id';
  public $incrementing = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'mal_id', 'alt_rules', 'check_youtube',
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'alt_rules' => 'array'
  ];
  public function getAltRulesAttribute($value) {
    return json_decode($value);
  }

  /**
  * Get the show this flag belongs to.
  *
  * @return \Illuminate\Database\Eloquent\Relations\Relation
  */
  public function show() {
    return $this->belongsTo(Show::class, 'mal_id', 'mal_id');
  }
}