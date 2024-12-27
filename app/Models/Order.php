<?php

namespace App\Models;

use Faker\Provider\ru_RU\PhoneNumber;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsMultiSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Where;
use Orchid\Screen\AsSource;

class Order extends Model
{
    use AsMultiSource;
    use HasFactory;
    use Filterable;
    protected $fillable = ['name','surename','adress','number','email','note','status','service_id'];
    protected $allowedFilters=[
        'email'=> Where::class,
        'id'=> Where::class,
        'number'=> Where::class,
        'adress'=> Where::class,
        'name'=> Where::class,
        'surename'=> Where::class,
        'service_id'=> Where::class,
    ];
    protected $allowedSorts=[
        'status','name','surename','adress','id','created_at','service_id'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
