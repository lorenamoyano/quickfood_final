<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class PedidoCarta extends Model
{
    protected $guarded = [];
    protected $table = 'pedidocarta' ;
    
    protected $primaryKey = 'id' ;


    //public $timestamps = false ;

    use HasFactory, Notifiable;

    public $fillable = [ 'idCarta'];

    /*public function getSearchResult(): SearchResult
    {
       return new SearchResult($this, $this->title, route('front.post.show', $this->slug));
    }*/

}