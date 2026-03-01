<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Product extends Model
{

    public int $id;
    public $title;
    private $basePrice;
    protected $category;
    public string $image;
    public string $origin;
    public string $benefit;
    public string $description;
    public array $sizes;
    public string $selectedSize;

    private array $sizeExtras;
    private float $customPrice;

    public bool $customDesign;

    public function __construct(
        int $id,
        string $title,
        string $category,
        string $image,
        string $origin,
        string $benefit,
        string $description,
        float $basePrice,
        array $sizes = [],

    ) {
        $this->id = $id;
        $this->title = $title;
        $this->category = $category;
        $this->image = $image;
        $this->origin = $origin;
        $this->benefit = $benefit;
        $this->description = $description;
        $this->basePrice = $basePrice;
        $this->customDesign = false;

        $this->sizeExtras = config('shop.size_extras');
        $this->customPrice = config('shop.custom_price');

        // $this->sizes = !empty($sizes) ? $sizes : array_keys($this->sizeExtras);
        $this->sizes = array_keys($this->sizeExtras); // завжди використовуються всі доступні розміри з конфігурації
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

    public function __get($name)
    {
        $allowed = [
            'id',
            'title',
            'category',
            'image',
            'origin',
            'benefit',
            'description',
            'basePrice',
            'customPrice',
            'selectedSize',
            'customDesign',
            'sizes'
        ];

        if (in_array($name, $allowed, true)) {
            return $this->$name;
        }


        throw new Exception("Property {$name} does not exist or is not accessible.");
    }

}


// Зі знижкою:
class SpecialProduct extends Product
{
    private float $discount;

    public function __construct($id, $title, $category, $image, $origin, $benefit, $description, $basePrice, $discount, $sizes)
    {
        parent::__construct($id, $title, $category, $image, $origin, $benefit, $description, $basePrice, $sizes);
        $this->discount = $discount;
    }

    public function getDiscountedPrice(): float
    {
        return $this->getPrice() * (1 - $this->discount); // 0.2 = 20% знижки
    }
}