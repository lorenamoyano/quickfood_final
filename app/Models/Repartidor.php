<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Repartidor extends Model
{
    protected $guarded = [];
    protected $table = 'repartidor' ;
    
    protected $primaryKey = 'id' ;


    //public $timestamps = false ;

    use HasFactory, Notifiable;

    public $fillable = ['idReparto','idCliente'];

    /*public function getSearchResult(): SearchResult
    {
       return new SearchResult($this, $this->title, route('front.post.show', $this->slug));
    }*/

    
}