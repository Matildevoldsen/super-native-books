<?php

namespace App\NativeComponents\Concerns;

trait HasIkeaData
{
    /**
     * @return array<int, array{name: string, icon: string}>
     */
    public static function ikeaCategories(): array
    {
        return [
            ['name' => 'Living Room', 'icon' => 'weekend'],
            ['name' => 'Bedroom', 'icon' => 'bed'],
            ['name' => 'Kitchen', 'icon' => 'countertops'],
            ['name' => 'Bathroom', 'icon' => 'bathroom'],
            ['name' => 'Office', 'icon' => 'desk'],
            ['name' => 'Dining', 'icon' => 'dining'],
            ['name' => 'Outdoor', 'icon' => 'deck'],
            ['name' => 'Storage', 'icon' => 'shelves'],
        ];
    }

    /**
     * @return array<int, array{name: string, seriesName: string, imageUrl: string, price: float, originalPrice: float|null, rating: float, reviewCount: int, category: string, badge: string|null, inStock: bool, description: string, dimensions: string, material: string, color: string, articleNumber: string, isNew: bool}>
     */
    public static function ikeaProducts(): array
    {
        return [
            [
                'name' => 'Sofa, 3-seat',
                'seriesName' => 'KLIPPAN',
                'imageUrl' => 'https://picsum.photos/seed/klippan/400/400',
                'price' => 349.00,
                'originalPrice' => null,
                'rating' => 4.5,
                'reviewCount' => 2847,
                'category' => 'Living Room',
                'badge' => null,
                'inStock' => true,
                'description' => 'A comfy sofa with a simple design that works well in various room settings. The cover is easy to keep clean since it is removable and machine washable.',
                'dimensions' => '180x88x66 cm',
                'material' => 'Cotton/polyester cover, wood frame',
                'color' => 'Vissle gray',
                'articleNumber' => '494.178.93',
                'isNew' => false,
            ],
            [
                'name' => 'Bookcase',
                'seriesName' => 'KALLAX',
                'imageUrl' => 'https://picsum.photos/seed/kallax/400/400',
                'price' => 84.99,
                'originalPrice' => null,
                'rating' => 4.7,
                'reviewCount' => 5102,
                'category' => 'Storage',
                'badge' => 'Popular',
                'inStock' => true,
                'description' => 'You can use the furniture as a room divider because it looks good from every angle. Choose whether you want to hang it on the wall or stand it on the floor.',
                'dimensions' => '77x39x147 cm',
                'material' => 'Particleboard, fiberboard',
                'color' => 'White',
                'articleNumber' => '802.758.87',
                'isNew' => false,
            ],
            [
                'name' => 'Bed frame with storage',
                'seriesName' => 'MALM',
                'imageUrl' => 'https://picsum.photos/seed/malm/400/400',
                'price' => 449.00,
                'originalPrice' => 549.00,
                'rating' => 4.3,
                'reviewCount' => 1893,
                'category' => 'Bedroom',
                'badge' => 'Last chance',
                'inStock' => true,
                'description' => 'Ample storage space is hidden neatly under the bed. A clean design that is just as beautiful on all sides. Place the bed on its own or with the headboard against a wall.',
                'dimensions' => '209x176x100 cm',
                'material' => 'Particleboard, fiberboard, solid wood',
                'color' => 'White stained oak veneer',
                'articleNumber' => '191.573.21',
                'isNew' => false,
            ],
            [
                'name' => 'Desk',
                'seriesName' => 'BEKANT',
                'imageUrl' => 'https://picsum.photos/seed/bekant/400/400',
                'price' => 299.00,
                'originalPrice' => null,
                'rating' => 4.4,
                'reviewCount' => 1245,
                'category' => 'Office',
                'badge' => null,
                'inStock' => true,
                'description' => 'Sit/stand desk with a deep table top that provides a generous work surface. The net underneath keeps cables in place but is easily accessible.',
                'dimensions' => '160x80x65-125 cm',
                'material' => 'Particleboard, linoleum, steel',
                'color' => 'White/white',
                'articleNumber' => '490.228.08',
                'isNew' => false,
            ],
            [
                'name' => 'Kitchen island',
                'seriesName' => 'VADHOLMA',
                'imageUrl' => 'https://picsum.photos/seed/vadholma/400/400',
                'price' => 499.00,
                'originalPrice' => null,
                'rating' => 4.6,
                'reviewCount' => 832,
                'category' => 'Kitchen',
                'badge' => null,
                'inStock' => true,
                'description' => 'Gives you extra storage, utility and work space. Perfect as a kitchen island in a bigger kitchen or against a wall in a smaller one.',
                'dimensions' => '126x79x90 cm',
                'material' => 'Solid birch, stainless steel',
                'color' => 'Black/oak',
                'articleNumber' => '303.508.22',
                'isNew' => false,
            ],
            [
                'name' => 'LED floor lamp',
                'seriesName' => 'HEKTOGRAM',
                'imageUrl' => 'https://picsum.photos/seed/hekto/400/400',
                'price' => 39.99,
                'originalPrice' => 49.99,
                'rating' => 4.2,
                'reviewCount' => 612,
                'category' => 'Living Room',
                'badge' => 'Lower price',
                'inStock' => true,
                'description' => 'Provides soft ambient lighting. You can easily aim the light where you need it because the lamp head is adjustable. Uses LEDs, which consume up to 85% less energy.',
                'dimensions' => '176 cm',
                'material' => 'Steel, polycarbonate',
                'color' => 'Dark gray',
                'articleNumber' => '004.601.81',
                'isNew' => false,
            ],
            [
                'name' => 'Dining table',
                'seriesName' => 'LISABO',
                'imageUrl' => 'https://picsum.photos/seed/lisabo/400/400',
                'price' => 199.00,
                'originalPrice' => null,
                'rating' => 4.5,
                'reviewCount' => 976,
                'category' => 'Dining',
                'badge' => null,
                'inStock' => true,
                'description' => 'Each table has its own unique character due to the distinctive grain pattern. The table top and legs are made of ash veneer and solid birch, durable materials.',
                'dimensions' => '140x78x74 cm',
                'material' => 'Ash veneer, solid birch',
                'color' => 'Ash veneer',
                'articleNumber' => '502.943.39',
                'isNew' => false,
            ],
            [
                'name' => 'Outdoor lounge chair',
                'seriesName' => 'APPLARO',
                'imageUrl' => 'https://picsum.photos/seed/applaro/400/400',
                'price' => 130.00,
                'originalPrice' => 165.00,
                'rating' => 4.3,
                'reviewCount' => 543,
                'category' => 'Outdoor',
                'badge' => 'Lower price',
                'inStock' => true,
                'description' => 'Perfect for relaxing outdoors. The back can be adjusted to five different positions. Foldable, easy to store when not in use.',
                'dimensions' => '63x80x101 cm',
                'material' => 'Acacia wood',
                'color' => 'Brown stained',
                'articleNumber' => '202.085.29',
                'isNew' => false,
            ],
            [
                'name' => 'Mirror cabinet with 2 doors',
                'seriesName' => 'HEMNES',
                'imageUrl' => 'https://picsum.photos/seed/hemnes/400/400',
                'price' => 189.00,
                'originalPrice' => null,
                'rating' => 4.6,
                'reviewCount' => 1134,
                'category' => 'Bathroom',
                'badge' => null,
                'inStock' => true,
                'description' => 'Shallow cabinet to keep all your smaller bathroom items organized. The mirror comes with safety film on the back, which reduces the risk of injury.',
                'dimensions' => '83x16x98 cm',
                'material' => 'Solid pine, mirror glass',
                'color' => 'White',
                'articleNumber' => '302.176.68',
                'isNew' => false,
            ],
            [
                'name' => 'Armchair',
                'seriesName' => 'STRANDMON',
                'imageUrl' => 'https://picsum.photos/seed/strandmon/400/400',
                'price' => 329.00,
                'originalPrice' => null,
                'rating' => 4.8,
                'reviewCount' => 3421,
                'category' => 'Living Room',
                'badge' => 'Top seller',
                'inStock' => true,
                'description' => 'A classic wing chair with a timeless design. The high back provides extra support for your neck. Year after year it becomes one of the most beloved armchairs.',
                'dimensions' => '82x96x101 cm',
                'material' => 'Cotton/polyester, birch frame',
                'color' => 'Nordvalla dark gray',
                'articleNumber' => '903.432.24',
                'isNew' => false,
            ],
            [
                'name' => 'Wardrobe',
                'seriesName' => 'PAX',
                'imageUrl' => 'https://picsum.photos/seed/pax/400/400',
                'price' => 570.00,
                'originalPrice' => null,
                'rating' => 4.4,
                'reviewCount' => 2156,
                'category' => 'Bedroom',
                'badge' => null,
                'inStock' => true,
                'description' => 'The PAX wardrobe can be customized to meet all your storage needs. Combine frames, doors, and interior organizers for a personalized solution.',
                'dimensions' => '150x60x236 cm',
                'material' => 'Particleboard, fiberboard',
                'color' => 'White',
                'articleNumber' => '290.235.17',
                'isNew' => false,
            ],
            [
                'name' => 'Rug, flatwoven',
                'seriesName' => 'STOCKHOLM',
                'imageUrl' => 'https://picsum.photos/seed/stockholm/400/400',
                'price' => 249.00,
                'originalPrice' => null,
                'rating' => 4.7,
                'reviewCount' => 789,
                'category' => 'Living Room',
                'badge' => 'New',
                'inStock' => true,
                'description' => 'The rug is hand-woven by skilled craftspeople. The striped pattern with bold colors makes it a statement piece in any living room.',
                'dimensions' => '170x240 cm',
                'material' => '100% wool',
                'color' => 'Striped black/off-white',
                'articleNumber' => '902.290.06',
                'isNew' => true,
            ],
        ];
    }

    /**
     * @return array<string>
     */
    public static function ikeaRoomIdeas(): array
    {
        return ['Small spaces', 'Scandinavian style', 'Budget friendly', 'Sustainable living', 'Student life', 'Family home'];
    }

    public static function formatIkeaPrice(float $price): string
    {
        if ($price == floor($price)) {
            return '$' . number_format($price, 0);
        }

        return '$' . number_format($price, 2);
    }

    public static function formatIkeaReviewCount(int $count): string
    {
        if ($count >= 1000) {
            return number_format($count / 1000, 1) . 'k';
        }

        return (string) $count;
    }
}
