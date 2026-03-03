<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Product extends Model
{
    // Поля з БД
    protected $fillable = [
        'title',
        'image',
        'alt',
        'text',
        'origin',
        'benefit',
        'description',
        'basePrice',
        'sizes', // необов'язкове
        'category_id', // необов'язкове
        'discount' // необов'язкове
    ];

    protected $casts = [
        'sizes' => 'array', // Eloquent автоматично декодує JSON у масив
        'discount' => 'float'
    ];

    // Немає в БД
    public $selectedSize;
    public $customDesign = false;

    // З config/shop.php
    public $sizeExtras;
    public $customPrice;


    public function __construct(
        array $attributes = [],
        array $sizes = [],

    ) {
        parent::__construct($attributes);

        $this->sizeExtras = config('shop.size_extras');
        $this->customPrice = config('shop.custom_price');

        $this->sizes = !empty($this->sizes)
            ? $this->sizes                               // беремо з БД
            : (!empty($sizes)
                ? $sizes                                 // інакше розміри, передані конструктору
                : array_keys($this->sizeExtras)); // інакше беремо всі розміри (дефолтні) з config

        $this->selectedSize = $this->sizes[0] ?? 'A5';
    }



    public function getPrice(): float
    {
        $price = $this->basePrice + ($this->sizeExtras[$this->selectedSize] ?? 0);

        if ($this->customDesign) {
            $price += $this->customPrice;
        }
        return $price;
    }

    public function getDiscountedPrice(): float
    {
        return $this->getPrice() * (1 - ($this->discount ?? 0));
    }

    // фільтр акційних
    public function scopeDiscounted($query)
    {
        return $query->where('discount', '>', 0);
    }


    public function getSizesAttribute($value)
    {
        return $value ?? array_keys($this->sizeExtras);
    }

    public function getSelectedSizeAttribute()
    {
        return $this->selectedSize;
    }

    public function getCustomDesignAttribute()
    {
        return $this->customDesign;
    }


    // Зв’язки Eloquent
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}