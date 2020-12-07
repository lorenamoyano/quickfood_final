<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Reparto extends Model
{
    protected $guarded = [];
    protected $table = 'reparto' ;
    
    protected $primaryKey = 'id' ;


    //public $timestamps = false ;

    use HasFactory, Notifiable;

    public $fillable = [ 'idCliente', 'idPedido', 'recogida'];
    
}