<?php
//model relaciona-se com uma tabela do banco
namespace App\Models;

use App\Enums\RegisterStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registers extends Model
{
    use HasFactory; 
  
    protected $fillable =['name','cpf','number'];
    
    public function status(): Attribute
    {   //manda para o banco apenas o name do status
        return Attribute::make(
            set: fn (RegisterStatus $status) => $status->name,
        );
        
    }
}
