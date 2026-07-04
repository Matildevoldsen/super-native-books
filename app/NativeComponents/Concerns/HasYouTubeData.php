<?php

namespace App\NativeComponents\Concerns;

trait HasYouTubeData
{
    /**
     * @return array<int, array{name: string, handle: string, avatarUrl: string, subscribers: int, description: string, isVerified: bool, bannerUrl: string, videoCount: int}>
     */
    public static function ytChannels(): array
    {
        return [
            [
                'name' => 'MrBeast',
                'handle' => '@MrBeast',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ytmrbeast',
                'subscribers' => 340000000,
                'description' => 'Go watch my newest video! New videos every Saturday.',
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/ytbanner1/800/200',
                'videoCount' => 815,
            ],
            [
                'name' => 'Marques Brownlee',
                'handle' => '@mkbhd',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ytmkbhd',
                'subscribers' => 19800000,
                'description' => 'MKBHD: Quality Tech Videos | Quality. Pair of 8s.',
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/ytbanner2/800/200',
                'videoCount' => 1650,
            ],
            [
                'name' => 'Veritasium',
                'handle' => '@veritasium',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ytveritasium',
                'subscribers' => 16200000,
                'description' => 'An element of truth - videos about science, education, and anything else I find interesting.',
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/ytbanner3/800/200',
                'videoCount' => 420,
            ],
            [
                'name' => 'Fireship',
                'handle' => '@Fireship',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ytfireship',
                'subscribers' => 3400000,
                'description' => 'High-intensity code tutorials and tech news to help you ship your app faster.',
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/ytbanner4/800/200',
                'videoCount' => 580,
            ],
            [
                'name' => 'Linus Tech Tips',
                'handle' => '@LinusTechTips',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ytlinus',
                'subscribers' => 16500000,
                'description' => 'Tech can be complicated; we try to make it easy. Linus Tech Tips is the biggest tech channel on YouTube.',
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/ytbanner5/800/200',
                'videoCount' => 6200,
            ],
            [
                'name' => 'Casey Neistat',
                'handle' => '@casey',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ytcasey',
                'subscribers' => 12800000,
                'description' => 'Filmmaker and vlogger based in New York City.',
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/ytbanner6/800/200',
                'videoCount' => 950,
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, channelId: int, thumbnailUrl: string, views: int, uploadedAt: string, duration: string, description: string, likes: int, commentCount: int}>
     */
    public static function ytVideos(): array
    {
        return [
            [
                'title' => '$1 vs $1,000,000 Hotel Room!',
                'channelId' => 0,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid1/640/360',
                'views' => 245000000,
                'uploadedAt' => '2 weeks ago',
                'duration' => '18:42',
                'description' => 'We compared the cheapest hotel room to the most expensive hotel room in the world! Which one was worth it?',
                'likes' => 8200000,
                'commentCount' => 142000,
            ],
            [
                'title' => 'iPhone 17 Pro Review: They Finally Did It',
                'channelId' => 1,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid2/640/360',
                'views' => 12400000,
                'uploadedAt' => '5 days ago',
                'duration' => '21:15',
                'description' => 'The iPhone 17 Pro is the biggest upgrade in years. Here is everything you need to know.',
                'likes' => 520000,
                'commentCount' => 28000,
            ],
            [
                'title' => 'The Biggest Satisfying Physics of 2025',
                'channelId' => 2,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid3/640/360',
                'views' => 8900000,
                'uploadedAt' => '1 week ago',
                'duration' => '24:08',
                'description' => 'Physics is wild. From quantum entanglement to black holes, here are the most satisfying physics discoveries.',
                'likes' => 410000,
                'commentCount' => 18500,
            ],
            [
                'title' => 'God-Tier Developer Roadmap 2026',
                'channelId' => 3,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid4/640/360',
                'views' => 2100000,
                'uploadedAt' => '3 days ago',
                'duration' => '12:01',
                'description' => 'The mass extinction of junior developers has begun. Here is how to survive with the ultimate developer roadmap.',
                'likes' => 125000,
                'commentCount' => 4200,
            ],
            [
                'title' => 'We Built a $50,000 Gaming Setup',
                'channelId' => 4,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid5/640/360',
                'views' => 6800000,
                'uploadedAt' => '4 days ago',
                'duration' => '28:33',
                'description' => 'We spared no expense building the ultimate gaming setup. Custom water cooling, OLED monitors, and more.',
                'likes' => 310000,
                'commentCount' => 15000,
            ],
            [
                'title' => 'NYC Vlog: 48 Hours of Chaos',
                'channelId' => 5,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid6/640/360',
                'views' => 4500000,
                'uploadedAt' => '1 week ago',
                'duration' => '15:22',
                'description' => 'Two days in New York City, running around doing the craziest things. This city never sleeps and neither did we.',
                'likes' => 280000,
                'commentCount' => 9800,
            ],
            [
                'title' => 'I Gave My 1,000th Subscriber a House',
                'channelId' => 0,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid7/640/360',
                'views' => 189000000,
                'uploadedAt' => '3 weeks ago',
                'duration' => '22:17',
                'description' => 'I surprised my 1,000th subscriber with a brand new house. Their reaction was priceless!',
                'likes' => 7100000,
                'commentCount' => 98000,
            ],
            [
                'title' => 'Galaxy S26 Ultra: The Truth',
                'channelId' => 1,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid8/640/360',
                'views' => 9200000,
                'uploadedAt' => '2 weeks ago',
                'duration' => '19:44',
                'description' => 'Samsung went all out with the Galaxy S26 Ultra. But is it actually worth the upgrade? Let us find out.',
                'likes' => 380000,
                'commentCount' => 21000,
            ],
            [
                'title' => 'Why Gravity is NOT a Force',
                'channelId' => 2,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid9/640/360',
                'views' => 22000000,
                'uploadedAt' => '1 month ago',
                'duration' => '17:35',
                'description' => 'General relativity reveals that gravity is not actually a force. It is the curvature of spacetime itself.',
                'likes' => 890000,
                'commentCount' => 42000,
            ],
            [
                'title' => 'I Tried Every Framework So You Don\'t Have To',
                'channelId' => 3,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid10/640/360',
                'views' => 1800000,
                'uploadedAt' => '6 days ago',
                'duration' => '8:45',
                'description' => 'React, Vue, Svelte, Angular, Solid, Qwik, Astro, Fresh, and more. Which one is the best in 2026?',
                'likes' => 98000,
                'commentCount' => 3800,
            ],
            [
                'title' => 'I Survived 50 Hours in the World\'s Deepest Cave',
                'channelId' => 0,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid11/640/360',
                'views' => 156000000,
                'uploadedAt' => '1 month ago',
                'duration' => '25:10',
                'description' => 'We went to the deepest cave on Earth and survived 50 hours underground. It was terrifying.',
                'likes' => 6500000,
                'commentCount' => 87000,
            ],
            [
                'title' => 'The Best Laptop of 2026 is NOT What You Think',
                'channelId' => 4,
                'thumbnailUrl' => 'https://picsum.photos/seed/ytvid12/640/360',
                'views' => 5100000,
                'uploadedAt' => '1 week ago',
                'duration' => '16:48',
                'description' => 'After testing dozens of laptops, the winner surprised everyone. Performance, battery, and value compared.',
                'likes' => 240000,
                'commentCount' => 11000,
            ],
        ];
    }

    /**
     * @return array<int, array<int, array{username: string, avatarUrl: string, text: string, likes: int, time: string, replies: int}>>
     */
    public static function ytComments(): array
    {
        return [
            0 => [
                ['username' => 'TechEnthusiast99', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc1', 'text' => 'The $1 room was honestly not that bad lol', 'likes' => 42000, 'time' => '2 weeks ago', 'replies' => 340],
                ['username' => 'Sarah_Travels', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc2', 'text' => 'I stayed at the million dollar suite once. It really is incredible.', 'likes' => 18000, 'time' => '2 weeks ago', 'replies' => 89],
                ['username' => 'JustVibing', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc3', 'text' => 'MrBeast never disappoints with these comparisons', 'likes' => 9500, 'time' => '1 week ago', 'replies' => 45],
                ['username' => 'GamerDude420', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc4', 'text' => 'Imagine spending that much on a hotel room when you could buy a car', 'likes' => 7200, 'time' => '1 week ago', 'replies' => 123],
                ['username' => 'WorldExplorer', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc5', 'text' => 'The views from that suite were absolutely insane', 'likes' => 5400, 'time' => '10 days ago', 'replies' => 28],
            ],
            1 => [
                ['username' => 'AppleFanboy', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc6', 'text' => 'Finally a real upgrade! Take my money Apple', 'likes' => 15000, 'time' => '5 days ago', 'replies' => 210],
                ['username' => 'AndroidUser', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc7', 'text' => 'Samsung had all these features 3 years ago...', 'likes' => 8900, 'time' => '4 days ago', 'replies' => 456],
                ['username' => 'CasualViewer', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc8', 'text' => 'Great review as always MKBHD', 'likes' => 12000, 'time' => '5 days ago', 'replies' => 34],
            ],
            2 => [
                ['username' => 'ScienceNerd', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc9', 'text' => 'This channel makes me feel smarter every time I watch', 'likes' => 22000, 'time' => '1 week ago', 'replies' => 156],
                ['username' => 'PhysicsStudent', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc10', 'text' => 'My professor showed this in class. Better than the textbook.', 'likes' => 11000, 'time' => '5 days ago', 'replies' => 67],
            ],
            3 => [
                ['username' => 'CodeMonkey', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc11', 'text' => 'Fireship videos are like espresso shots for developers', 'likes' => 8500, 'time' => '3 days ago', 'replies' => 92],
                ['username' => 'JuniorDev2025', 'avatarUrl' => 'https://i.pravatar.cc/150?u=ytc12', 'text' => 'This roadmap actually makes sense. Subscribed!', 'likes' => 4200, 'time' => '2 days ago', 'replies' => 31],
            ],
        ];
    }

    /**
     * @return array<string, string>
     */
    public static function ytCategories(): array
    {
        return [
            'All' => '#FFFFFF',
            'Gaming' => '#272727',
            'Music' => '#272727',
            'Tech' => '#272727',
            'Sports' => '#272727',
            'News' => '#272727',
            'Science' => '#272727',
            'Comedy' => '#272727',
        ];
    }

    /**
     * @return array<int, array{title: string, channelId: int, thumbnailUrl: string, views: int, duration: string}>
     */
    public static function ytShorts(): array
    {
        return [
            ['title' => 'Wait for it... 🤯', 'channelId' => 0, 'thumbnailUrl' => 'https://picsum.photos/seed/ytshort1/270/480', 'views' => 89000000, 'duration' => '0:58'],
            ['title' => 'This phone trick is insane', 'channelId' => 1, 'thumbnailUrl' => 'https://picsum.photos/seed/ytshort2/270/480', 'views' => 12000000, 'duration' => '0:45'],
            ['title' => 'Science in 60 seconds', 'channelId' => 2, 'thumbnailUrl' => 'https://picsum.photos/seed/ytshort3/270/480', 'views' => 5400000, 'duration' => '0:59'],
            ['title' => 'Code in 100 seconds', 'channelId' => 3, 'thumbnailUrl' => 'https://picsum.photos/seed/ytshort4/270/480', 'views' => 3200000, 'duration' => '1:00'],
        ];
    }

    public static function formatYtCount(int $count): string
    {
        if ($count >= 1000000000) {
            $val = round($count / 1000000000, 1);

            return rtrim(rtrim(number_format($val, 1), '0'), '.') . 'B';
        }

        if ($count >= 1000000) {
            $val = round($count / 1000000, 1);

            return rtrim(rtrim(number_format($val, 1), '0'), '.') . 'M';
        }

        if ($count >= 1000) {
            $val = round($count / 1000, 1);

            return rtrim(rtrim(number_format($val, 1), '0'), '.') . 'K';
        }

        return (string) $count;
    }
}