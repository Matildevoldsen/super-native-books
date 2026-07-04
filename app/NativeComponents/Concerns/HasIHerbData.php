<?php

namespace App\NativeComponents\Concerns;

trait HasIHerbData
{
    /**
     * @return array<int, array{name: string, icon: string, productCount: int}>
     */
    public static function iherbCategories(): array
    {
        return [
            ['name' => 'Supplements', 'icon' => 'medication', 'productCount' => 25439],
            ['name' => 'Sports', 'icon' => 'fitness_center', 'productCount' => 8234],
            ['name' => 'Bath & Care', 'icon' => 'spa', 'productCount' => 12876],
            ['name' => 'Beauty', 'icon' => 'face', 'productCount' => 9543],
            ['name' => 'Grocery', 'icon' => 'shopping_basket', 'productCount' => 7891],
            ['name' => 'Home', 'icon' => 'home', 'productCount' => 5432],
            ['name' => 'Baby & Kids', 'icon' => 'child_care', 'productCount' => 4567],
            ['name' => 'Pets', 'icon' => 'pets', 'productCount' => 2345],
        ];
    }

    /** @return array<string> */
    public static function healthTopics(): array
    {
        return ['Vitamins', 'Immune Support', 'Heart', 'Herbs', 'Minerals', 'Gut Health', 'Mood & Anxiety', 'Protein', 'Collagen'];
    }

    /**
     * @return array<int, array{name: string, brand: string, imageUrl: string, price: float, originalPrice: float|null, rating: float, reviewCount: int, soldIn30Days: string, category: string, badge: string|null, inStock: bool, description: string, servingInfo: string, bestBy: string, shippingWeight: string, rankings: array<string>}>
     */
    public static function iherbProducts(): array
    {
        return [
            [
                'name' => 'Omega-3 Premium Fish Oil, 100 Fish Gelatin Softgels',
                'brand' => 'California Gold Nutrition',
                'imageUrl' => 'https://picsum.photos/seed/omega3/400/400',
                'price' => 12.20,
                'originalPrice' => 14.00,
                'rating' => 4.8,
                'reviewCount' => 473878,
                'soldIn30Days' => '90K+',
                'category' => 'Supplements',
                'badge' => 'iHerb Brands',
                'inStock' => true,
                'description' => 'California Gold Nutrition Omega-3 Premium Fish Oil contains concentrated fish oil that is processed and manufactured in Germany. It features 180 mg EPA / 120 mg DHA per softgel and is molecularly distilled to remove mercury and other contaminants.',
                'servingInfo' => '$0.12/softgel',
                'bestBy' => '03/2027',
                'shippingWeight' => '0.4 lb',
                'rankings' => ['#1 in Fish Oil', '#3 in Supplements'],
            ],
            [
                'name' => 'CollagenUP, Hydrolyzed Marine Collagen Peptides with Hyaluronic Acid and Vitamin C',
                'brand' => 'California Gold Nutrition',
                'imageUrl' => 'https://picsum.photos/seed/collagen/400/400',
                'price' => 17.46,
                'originalPrice' => 22.00,
                'rating' => 4.7,
                'reviewCount' => 307383,
                'soldIn30Days' => '60K+',
                'category' => 'Supplements',
                'badge' => 'iHerb Brands',
                'inStock' => true,
                'description' => 'Features clinically studied marine-sourced collagen peptides with hyaluronic acid and vitamin C. Supports healthy skin, hair, nails, and joints. Non-GMO, gluten free, soy free.',
                'servingInfo' => '$0.58/serving',
                'bestBy' => '05/2027',
                'shippingWeight' => '0.6 lb',
                'rankings' => ['#1 in Collagen', '#5 in Beauty Supplements'],
            ],
            [
                'name' => 'High Absorption Magnesium Lysinate Glycinate, Chelated, 240 Tablets',
                'brand' => "Doctor's Best",
                'imageUrl' => 'https://picsum.photos/seed/magnesium/400/400',
                'price' => 20.99,
                'originalPrice' => null,
                'rating' => 4.7,
                'reviewCount' => 188574,
                'soldIn30Days' => '80K+',
                'category' => 'Supplements',
                'badge' => 'Best seller',
                'inStock' => true,
                'description' => "Doctor's Best High Absorption Magnesium uses a patented, organic, chelated delivery form of magnesium to optimize bioavailability and GI tolerance. Supports bone density, muscle relaxation, and a healthy sleep cycle.",
                'servingInfo' => '$0.09/tablet',
                'bestBy' => '11/2027',
                'shippingWeight' => '0.5 lb',
                'rankings' => ['#1 in Magnesium', '#10 in Minerals'],
            ],
            [
                'name' => 'Magnesium Glycinate, 180 Tablets',
                'brand' => 'NOW Foods',
                'imageUrl' => 'https://picsum.photos/seed/nowmag/400/400',
                'price' => 19.59,
                'originalPrice' => 24.49,
                'rating' => 4.6,
                'reviewCount' => 30061,
                'soldIn30Days' => '70K+',
                'category' => 'Supplements',
                'badge' => 'Best seller',
                'inStock' => true,
                'description' => 'NOW Magnesium Glycinate is a highly bioavailable form of magnesium chelated with the amino acid glycine. Supports nervous system health, muscle comfort, and restful sleep.',
                'servingInfo' => '$0.11/tablet',
                'bestBy' => '08/2027',
                'shippingWeight' => '0.4 lb',
                'rankings' => ['#2 in Magnesium', '#15 in Minerals'],
            ],
            [
                'name' => 'Vitamin C Gummies with Vitamin A, 90 Gummies',
                'brand' => 'California Gold Nutrition',
                'imageUrl' => 'https://picsum.photos/seed/vitc/400/400',
                'price' => 6.78,
                'originalPrice' => 11.74,
                'rating' => 4.7,
                'reviewCount' => 73576,
                'soldIn30Days' => '45K+',
                'category' => 'Supplements',
                'badge' => 'iHerb Brands',
                'inStock' => true,
                'description' => 'Delicious vitamin C gummies that also feature vitamin A. Made with natural flavors and colors. No gelatin, no gluten, no GMOs, no soy. Suitable for vegetarians.',
                'servingInfo' => '$0.08/gummy',
                'bestBy' => '01/2027',
                'shippingWeight' => '0.3 lb',
                'rankings' => ['#5 in Vitamin C', '#8 in Gummy Vitamins'],
            ],
            [
                'name' => 'PQQ, 20 mg, 30 Veggie Softgels',
                'brand' => 'California Gold Nutrition',
                'imageUrl' => 'https://picsum.photos/seed/pqq/400/400',
                'price' => 6.73,
                'originalPrice' => 11.21,
                'rating' => 4.6,
                'reviewCount' => 8795,
                'soldIn30Days' => '15K+',
                'category' => 'Supplements',
                'badge' => null,
                'inStock' => true,
                'description' => 'PQQ (Pyrroloquinoline Quinone) supports mitochondrial biogenesis and cellular energy production. Promotes cognitive function and heart health.',
                'servingInfo' => '$0.22/softgel',
                'bestBy' => '09/2027',
                'shippingWeight' => '0.1 lb',
                'rankings' => ['#1 in PQQ', '#45 in Brain & Cognitive'],
            ],
            [
                'name' => 'Whey Protein Isolate, Unflavored, 5 lbs',
                'brand' => 'NOW Foods',
                'imageUrl' => 'https://picsum.photos/seed/whey/400/400',
                'price' => 64.99,
                'originalPrice' => 79.99,
                'rating' => 4.6,
                'reviewCount' => 12450,
                'soldIn30Days' => '25K+',
                'category' => 'Sports',
                'badge' => 'Best seller',
                'inStock' => true,
                'description' => 'NOW Sports Whey Protein Isolate is a high quality protein that is bioavailable and easily digested. 25g of protein per serving with BCAAs. Unflavored for versatile use.',
                'servingInfo' => '$0.97/serving',
                'bestBy' => '12/2027',
                'shippingWeight' => '5.2 lb',
                'rankings' => ['#2 in Whey Protein', '#5 in Sports Nutrition'],
            ],
            [
                'name' => 'Argan Oil Shampoo, Restorative Formula, 16 fl oz',
                'brand' => 'Artnaturals',
                'imageUrl' => 'https://picsum.photos/seed/shampoo/400/400',
                'price' => 9.99,
                'originalPrice' => 12.99,
                'rating' => 4.4,
                'reviewCount' => 45230,
                'soldIn30Days' => '30K+',
                'category' => 'Bath & Care',
                'badge' => null,
                'inStock' => true,
                'description' => 'Artnaturals Argan Oil Shampoo is infused with organic Moroccan argan oil, aloe vera, keratin, and botanical extracts. Gently cleanses while restoring shine and softness.',
                'servingInfo' => '',
                'bestBy' => '06/2027',
                'shippingWeight' => '1.2 lb',
                'rankings' => ['#3 in Shampoo', '#10 in Bath & Personal Care'],
            ],
            [
                'name' => 'Vitamin D3, 5000 IU, 360 Softgels',
                'brand' => "Doctor's Best",
                'imageUrl' => 'https://picsum.photos/seed/vitd/400/400',
                'price' => 12.49,
                'originalPrice' => 15.99,
                'rating' => 4.8,
                'reviewCount' => 95430,
                'soldIn30Days' => '55K+',
                'category' => 'Supplements',
                'badge' => 'Best seller',
                'inStock' => true,
                'description' => 'High potency Vitamin D3 to support immune function, bone health, and overall wellness. Each softgel provides 5000 IU (125 mcg) of vitamin D3 in a convenient form.',
                'servingInfo' => '$0.03/softgel',
                'bestBy' => '04/2028',
                'shippingWeight' => '0.2 lb',
                'rankings' => ['#1 in Vitamin D', '#2 in Supplements'],
            ],
            [
                'name' => 'Organic Manuka Honey, MGO 250+, 8.8 oz',
                'brand' => 'Manuka Health',
                'imageUrl' => 'https://picsum.photos/seed/manuka/400/400',
                'price' => 29.99,
                'originalPrice' => 39.99,
                'rating' => 4.7,
                'reviewCount' => 28340,
                'soldIn30Days' => '20K+',
                'category' => 'Grocery',
                'badge' => null,
                'inStock' => true,
                'description' => 'Premium New Zealand Manuka Honey with a minimum MGO 250+ rating. Rich in beneficial compounds, perfect for immune support, digestive health, and everyday wellness.',
                'servingInfo' => '$1.20/serving',
                'bestBy' => '02/2028',
                'shippingWeight' => '0.7 lb',
                'rankings' => ['#1 in Manuka Honey', '#3 in Grocery'],
            ],
            [
                'name' => 'CurcuminUP, 30 Fish Gelatin Softgels',
                'brand' => 'California Gold Nutrition',
                'imageUrl' => 'https://picsum.photos/seed/curcumin/400/400',
                'price' => 13.75,
                'originalPrice' => 16.18,
                'rating' => 4.6,
                'reviewCount' => 10910,
                'soldIn30Days' => '18K+',
                'category' => 'Supplements',
                'badge' => 'iHerb Brands',
                'inStock' => true,
                'description' => 'Features omega-3 curcuminoid complex for enhanced bioavailability. Supports joint comfort, brain health, and provides powerful antioxidant protection.',
                'servingInfo' => '$0.46/softgel',
                'bestBy' => '07/2027',
                'shippingWeight' => '0.15 lb',
                'rankings' => ['#3 in Curcumin', '#20 in Herbs'],
            ],
            [
                'name' => 'Zinc Picolinate, 50 mg, 60 Capsules',
                'brand' => 'Swanson',
                'imageUrl' => 'https://picsum.photos/seed/zinc/400/400',
                'price' => 5.99,
                'originalPrice' => 7.49,
                'rating' => 4.6,
                'reviewCount' => 2420,
                'soldIn30Days' => '12K+',
                'category' => 'Supplements',
                'badge' => null,
                'inStock' => true,
                'description' => 'Highly absorbable zinc in the picolinate form to support immune function, skin health, and reproductive wellness. 50 mg per capsule.',
                'servingInfo' => '$0.10/capsule',
                'bestBy' => '10/2028',
                'shippingWeight' => '0.1 lb',
                'rankings' => ['#5 in Zinc', '#30 in Minerals'],
            ],
        ];
    }

    public static function formatReviewCount(int $count): string
    {
        if ($count >= 1000) {
            return number_format($count);
        }

        return (string) $count;
    }

    public static function formatPrice(float $price): string
    {
        return '$' . number_format($price, 2);
    }

    /**
     * @return array<int, array{name: string, count: int}>
     */
    public static function subcategories(): array
    {
        return [
            ['name' => 'Herbs', 'count' => 5003],
            ['name' => 'Vitamins', 'count' => 4639],
            ['name' => 'Gut Health', 'count' => 2891],
            ['name' => 'Brain & Cognitive', 'count' => 2640],
            ['name' => 'Minerals', 'count' => 2486],
            ['name' => 'Antioxidants', 'count' => 2040],
            ['name' => "Children's Health", 'count' => 1703],
            ['name' => 'Amino Acids', 'count' => 1646],
        ];
    }
}
