<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Категорії
        $categories = [
            'Ігри',
            'Аніме',
            'Романтика',
            'Космос',
            'Тварини',
            'Абстракція',
            'Серіали',
            'Природа'
        ];
        foreach ($categories as $name) {
            Category::updateOrCreate(['name' => $name]);
        }

        $categoryMap = Category::pluck('id', 'name');

        // Теги
        $tags = [
            'Популярне',
            'Новинка',
            'Колекційне',
            'Романтика',
            'Геймерське',
            'Знижка'
        ];
        foreach ($tags as $name) {
            Tag::updateOrCreate(['name' => $name]);
        }

        $tagMap = Tag::pluck('id', 'name');

        // Товари
        $products = [
            [
                "image" => "/images/backlit-frame-lightbox-leap-of-faith.webp",
                "alt" => "Стрибок віри",
                "title" => "Стрибок віри",
                "text" => "Гра: Кредо вбивці / Assassin's Creed",
                "category" => "Ігри",
                "origin" => "Кредо вбивці",
                "benefit" => "🎮 Ідеальний для фанатів Assassin's Creed та геймерів",
                "description" => "Цей світильник створений для тих, хто цінує атмосферу відеоігор і хоче додати в свій інтер’єр унікальний декор, натхненний всесвітом Assassin's Creed.",
                "basePrice" => 1150,
                "tags" => ['Популярне', 'Геймерське'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-eren-end-mikasa.webp",
                "alt" => "Ерен та Мікаса",
                "title" => "Ерен та Мікаса",
                "text" => "Аніме: Атака титанів / Attack on Titan",
                "category" => "Аніме",
                "origin" => "Атака титанів",
                "benefit" => "🎁 Ідеальний подарунок для шанувальників аніме, колекціонерів та поціновувачів стильного декору.",
                "description" => "Cтворено для тих, хто вірить у силу дружби, підтримки та внутрішній вогонь, що веде вперед навіть крізь темряву — як у історії Ерена та Мікаси.",
                "basePrice" => 1150,
                "tags" => ['Популярне', 'Новинка'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-romantic-photo.webp",
                "alt" => "Романтика / персональні фото",
                "title" => "Парний портрет",
                "text" => "Романтика",
                "category" => "Романтика",
                "origin" => "Персональні фото",
                "benefit" => "💖 Ідеальний подарунок для закоханих пар",
                "description" => "Унікальний світильник для романтичних пар, який підкреслює індивідуальність вашого кохання і додає затишок у будь-яке приміщення, створюючи теплу атмосферу.",
                "basePrice" => 1150,
                "tags" => ['Романтика'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-space-2.webp",
                "alt" => "Космос",
                "title" => "Галактика Андромеди",
                "text" => "Космос: Галактика",
                "category" => "Космос",
                "origin" => "Астрономічна тематика",
                "benefit" => "🌌 Декор для поціновувачів космосу та зірок",
                "description" => "Світильник, що переносить у космічну безмежність, дозволяє відчути красу Галактики Андромеди та створити атмосферу загадковості у кімнаті.",
                "basePrice" => 1150,
                "tags" => ['Колекційне'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-itachi-uchiha.webp",
                "alt" => "Ітачі Учіха",
                "title" => "Ітачі Учіха",
                "text" => "Аніме: Наруто / Naruto",
                "category" => "Аніме",
                "origin" => "Наруто",
                "benefit" => "🌟 Для фанатів Наруто та колекціонерів аніме",
                "description" => "Цей світильник з Ітачі Учіха створений для справжніх фанатів Наруто, щоб додати в кімнату дух легендарного аніме та стильний елемент декору.",
                "basePrice" => 1150,
                "tags" => ['Популярне'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-dog.webp",
                "alt" => "Золотистий ретривер",
                "title" => "Собака",
                "text" => "Тварини: собака",
                "category" => "Тварини",
                "origin" => "Золотистий ретривер",
                "benefit" => "🐾 Для любителів собак та домашніх улюбленців",
                "description" => "Стильний світильник із зображенням золотистого ретривера підійде для справжніх любителів собак, додаючи тепло та затишок у ваш інтер’єр.",
                "basePrice" => 1150,
                "tags" => ['Колекційне'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-abstraction.webp",
                "alt" => "Кіберсхема",
                "title" => "Кіберсхема",
                "text" => "Абстракція",
                "category" => "Абстракція",
                "origin" => "Цифровий арт",
                "benefit" => "🎨 Для цінителів сучасного мистецтва та абстракції",
                "description" => "Абстрактний світильник 'Кіберсхема' ідеально впишеться в сучасний інтер’єр, створюючи футуристичну атмосферу та стильний акцент у кімнаті.",
                "basePrice" => 1150,
                "tags" => [],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-daenerys-with-drogon.webp",
                "alt" => "Гра престолів",
                "title" => "Дейнеріс Таргарієн та Дрогон",
                "text" => "Серіал: Гра престолів / Game of Thrones",
                "category" => "Серіали",
                "origin" => "Game of Thrones",
                "benefit" => "🔥 Для фанатів серіалу та колекціонерів тематичного мерчу",
                "description" => "Світильник з Дейнеріс Таргарієн та Дрогоном перенесе вас у всесвіт 'Game of Thrones', додаючи атмосферу легендарного серіалу у ваш дім.",
                "basePrice" => 1150,
                "tags" => ['Популярне'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-mountain.webp",
                "alt" => "Гора",
                "title" => "Гірський пейзаж",
                "text" => "Природа",
                "category" => "Природа",
                "origin" => "Пейзаж",
                "benefit" => "🏔 Для любителів природи та декору інтер’єру",
                "description" => "Світильник з гірським пейзажем створений для тих, хто цінує природу і хоче додати у свій простір спокій та гармонію від величних гір.",
                "basePrice" => 1150,
                "sizes" => ['A4'],
                'discount' => 0.2,
                "tags" => [],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-itachi.webp",
                "alt" => "Ітачі",
                "title" => "Ітачі",
                "text" => "Аніме: Наруто / Naruto",
                "category" => "Аніме",
                "origin" => "Наруто",
                "benefit" => "🌟 Для фанатів Наруто та колекціонерів аніме",
                "description" => "Цей світильник з Ітачі допоможе створити атмосферу легендарного аніме, додаючи стильний акцент і колекційну цінність у кімнату фаната Naruto.",
                "basePrice" => 1150,
                "tags" => ['Популярне'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-dog-profile.webp",
                "alt" => "Профіль собаки",
                "title" => "Профіль собаки",
                "text" => "Тварини: собака",
                "category" => "Тварини",
                "origin" => "Золотистий ретривер",
                "benefit" => "🐾 Для любителів собак та декоративного мистецтва",
                "description" => "Світильник з профілем собаки стане стильним елементом декору для дому, підкреслюючи любов до тварин та увагу до деталей.",
                "basePrice" => 1150,
                "tags" => ['Колекційне'],
            ],
            [
                "image" => "/images/backlit-frame-lightbox-space.webp",
                "alt" => "Небесні тіла",
                "title" => "Небесні тіла",
                "text" => "Космос",
                "category" => "Космос",
                "origin" => "Астрономія",
                "benefit" => "🌌 Декор для любителів космосу та планет",
                "description" => "Світильник з небесними тілами допомагає відчути красу всесвіту та створює затишну, натхненну атмосферу для роботи чи відпочинку.",
                "basePrice" => 1150,
                "tags" => [],
            ]
        ];


        foreach ($products as $p) {
            $product = Product::create([
                'title' => $p['title'],
                'image' => $p['image'],
                'alt' => $p['alt'],
                'text' => $p['text'],
                'origin' => $p['origin'],
                'benefit' => $p['benefit'],
                'description' => $p['description'],
                'basePrice' => $p['basePrice'],
                'sizes' => $p['sizes'] ?? null,
                'category_id' => $categoryMap[$p['category']] ?? null,
                'discount' => $p['discount'] ?? 0,
            ]);

            // Прив’язка тегів
            $tagIds = [];
            if (!empty($p['tags'])) {
                foreach ($p['tags'] as $tagName) {
                    if (isset($tagMap[$tagName])) {
                        $tagIds[] = $tagMap[$tagName];
                    }
                }
            }
            // Додає тег "Знижка"
            if (($p['discount'] ?? 0) > 0 && isset($tagMap['Знижка'])) {
                $tagIds[] = $tagMap['Знижка'];
            }

            if (!empty($tagIds)) {
                $product->tags()->sync($tagIds);
                // $product->tags()->attach($tagIds); // теги можуть дублюватися, якщо сидер запускається повторно
            }
        }
    }
}