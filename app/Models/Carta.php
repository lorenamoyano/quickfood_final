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

    /*public function getSearchResult(): SearchResult
    {
       return new SearchResult($this, $this->title, route('front.post.show', $this->slug));
    }*/

    public function nombre()
    {
    	return $this->hasOne(Nombre::class);
    }

}
