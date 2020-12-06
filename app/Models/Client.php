<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


	protected $table='clients';
	protected $fillable=['id','name','type','number'];
    use HasFactory;


    public function setClient($value){
    	$this->clients['type']=json_encode($value);
    }
    public function getClient($value){
    	return $this->clients['type']=json_decode($value);
    }
}
