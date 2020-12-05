<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Facades\Auth;
use App\Models\Carta;

class Cart extends Model
{
    protected $guarded = [];
    protected $table = 'cart' ;
    
    protected $primaryKey = 'id' ;


    //public $timestamps = false ;

    use HasFactory, Notifiable;

    public $fillable = [ 'idCliente' , 'idCarta' , 'cantidad'];

    /*public function getSearchResult(): SearchResult
    {
       return new SearchResult($this, $this->title, route('front.post.show', $this->slug));
    }*/

    /*public static function userCartItems() {
        $userCartItems = Cart::with('carta')->where('idCli' , Auth::user()->id)->get()->toArray();
        return $userCartItems;
    }

    public function product() {
        return $this->belongsTo('App\Carta' , 'idCarta');
    }
*/
    
}