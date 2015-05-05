<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model  {
// this is the place model basically we don't need to do anything laravel handel the model we just need to make a file
// like database table name and inherit Model class.
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'places';

    /**
     * Attributes that should be mass-assignable.
     * // this is some basic setting we don't need to check
     * @var array
     */
    protected $fillable = ['title', 'description',
        'property_type', 'room', 'location',
        'available_from', 'pictures','email','phone','status','user_id','location','price'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Pictures(){

            return unserialize($this->pictures);

        return $pictures = array();
    }
}