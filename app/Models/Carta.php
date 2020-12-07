<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Carta extends Model
{
    protected $guarded = [];
    protected $table = 'carta' ;
   // protected $primaryKey = 'id' ;


    //public $timestamps = false ;

    use HasFactory, Notifiable;

    public $fillable = [ 'nombre', 'precio' , 'descripcion'];

    public function nombre()
    {
    	return $this->hasOne(Nombre::class);
    }

    public function carta()
    {
        return $this->hasMany('App\Carta','id');
    }

}
