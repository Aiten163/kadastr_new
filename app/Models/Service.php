<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Where;
use Orchid\Screen\AsMultiSource;

class Service extends Model
{
    use AsMultiSource;
    use HasFactory;
    use Filterable;
    protected $fillable = ['name','image','text','position','price'];
    protected $allowedFilters=[
        'name'=> Where::class,
        'image'=> Where::class,
        'text'=> Where::class,
        'id'=> Where::class,
        'price'=> Where::class,
        'position'=> Where::class,
    ];
    protected $allowedSorts=[
        'image','name','text','position','id','created_at','price'
    ];
}
