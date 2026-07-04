<?php

namespace App\NativeComponents\Concerns;

trait HasTweetData
{
    /**
     * @return array<int, array{name: string, handle: string, avatarUrl: string, bio: string, following: int, followers: int, isVerified: bool, bannerUrl: string}>
     */
    public static function tweetUsers(): array
    {
        return [
            [
                'name' => 'Taylor Otwell',
                'handle' => '@taylorotwell',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=taylor',
                'bio' => 'Creator of Laravel. Husband and father.',
                'following' => 312,
                'followers' => 186500,
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/banner1/800/200',
            ],
            [
                'name' => 'Nuno Maduro',
                'handle' => '@enunomaduro',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=nuno',
                'bio' => 'Software Engineer at Laravel. Building Pest, Pint, and more.',
                'following' => 1204,
                'followers' => 42300,
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/banner2/800/200',
            ],
            [
                'name' => 'Caleb Porzio',
                'handle' => '@calebporzio',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=caleb',
                'bio' => 'Creator of Livewire & Alpine.js. Full-stack developer.',
                'following' => 856,
                'followers' => 38900,
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/banner3/800/200',
            ],
            [
                'name' => 'Sarah Chen',
                'handle' => '@sarahcodes',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=sarah',
                'bio' => 'Full-stack dev building cool things. TypeScript & PHP lover.',
                'following' => 423,
                'followers' => 12800,
                'isVerified' => false,
                'bannerUrl' => 'https://picsum.photos/seed/banner4/800/200',
            ],
            [
                'name' => 'Alex Rivera',
                'handle' => '@alexdev',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=alex',
                'bio' => 'Mobile & web developer. Open source enthusiast.',
                'following' => 1567,
                'followers' => 8920,
                'isVerified' => false,
                'bannerUrl' => 'https://picsum.photos/seed/banner5/800/200',
            ],
            [
                'name' => 'PHP Weekly',
                'handle' => '@phpweekly',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=phpweekly',
                'bio' => 'Your weekly dose of PHP news, articles, and tutorials.',
                'following' => 78,
                'followers' => 95600,
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/banner6/800/200',
            ],
            [
                'name' => 'Marcus Johnson',
                'handle' => '@marcusj',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=marcus',
                'bio' => 'Designer turned developer. Building beautiful UIs.',
                'following' => 634,
                'followers' => 15200,
                'isVerified' => false,
                'bannerUrl' => 'https://picsum.photos/seed/banner7/800/200',
            ],
            [
                'name' => 'Laravel News',
                'handle' => '@laravelnews',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=laravelnews',
                'bio' => 'The official source for Laravel news, tutorials, and packages.',
                'following' => 245,
                'followers' => 223000,
                'isVerified' => true,
                'bannerUrl' => 'https://picsum.photos/seed/banner8/800/200',
            ],
        ];
    }

    /**
     * @return array<int, array{userId: int, text: string, time: string, replyCount: int, retweetCount: int, likeCount: int, imageUrl: string|null}>
     */
    public static function tweets(): array
    {
        return [
            [
                'userId' => 0,
                'text' => "Just shipped Laravel 12! This is our best release yet. New streamlined structure, improved performance, and so much more. Check it out!",
                'time' => '2h',
                'replyCount' => 342,
                'retweetCount' => 1890,
                'likeCount' => 12400,
                'imageUrl' => null,
            ],
            [
                'userId' => 2,
                'text' => "Livewire v4 is here and it's incredible. The new reactive model makes building dynamic UIs feel effortless. No JavaScript required.",
                'time' => '4h',
                'replyCount' => 156,
                'retweetCount' => 890,
                'likeCount' => 5600,
                'imageUrl' => 'https://picsum.photos/seed/tweet1/800/400',
            ],
            [
                'userId' => 1,
                'text' => 'Pest v4 now supports parallel testing out of the box. Your test suite just got a whole lot faster.',
                'time' => '5h',
                'replyCount' => 89,
                'retweetCount' => 456,
                'likeCount' => 3200,
                'imageUrl' => null,
            ],
            [
                'userId' => 3,
                'text' => 'Hot take: TypeScript and PHP are the best combo for full-stack development in 2025. Fight me.',
                'time' => '8h',
                'replyCount' => 234,
                'retweetCount' => 167,
                'likeCount' => 1890,
                'imageUrl' => null,
            ],
            [
                'userId' => 7,
                'text' => 'New tutorial: Building a real-time dashboard with Laravel, Livewire, and native mobile components. Link in bio.',
                'time' => '10h',
                'replyCount' => 45,
                'retweetCount' => 234,
                'likeCount' => 890,
                'imageUrl' => 'https://picsum.photos/seed/tweet4/800/400',
            ],
            [
                'userId' => 4,
                'text' => 'Just discovered NativePHP and my mind is blown. Building native mobile apps with Laravel? This changes everything.',
                'time' => '12h',
                'replyCount' => 67,
                'retweetCount' => 312,
                'likeCount' => 2100,
                'imageUrl' => null,
            ],
            [
                'userId' => 5,
                'text' => 'This week in PHP: New RFC for property hooks approved, Laravel 12 released, and Pest v4 drops with parallel testing support. What a week!',
                'time' => '1d',
                'replyCount' => 23,
                'retweetCount' => 567,
                'likeCount' => 1450,
                'imageUrl' => null,
            ],
            [
                'userId' => 6,
                'text' => 'Spent the weekend redesigning my portfolio using Tailwind CSS v4. The new color system is absolutely gorgeous.',
                'time' => '1d',
                'replyCount' => 34,
                'retweetCount' => 89,
                'likeCount' => 567,
                'imageUrl' => 'https://picsum.photos/seed/tweet7/800/400',
            ],
            [
                'userId' => 0,
                'text' => "Reminder: the best code is the code you don't have to write. Use conventions, lean on the framework, and ship faster.",
                'time' => '2d',
                'replyCount' => 178,
                'retweetCount' => 2340,
                'likeCount' => 15600,
                'imageUrl' => null,
            ],
            [
                'userId' => 2,
                'text' => 'Alpine.js v4 sneak peek: new x-teleport directive, improved reactivity engine, and 30% smaller bundle. Coming soon.',
                'time' => '2d',
                'replyCount' => 123,
                'retweetCount' => 678,
                'likeCount' => 4500,
                'imageUrl' => null,
            ],
        ];
    }

    /**
     * @return array<int, array{userId: int, text: string, time: string, likeCount: int}>
     */
    public static function tweetReplies(): array
    {
        return [
            ['userId' => 3, 'text' => 'Amazing work! The new file structure is so clean. Loving it.', 'time' => '1h', 'likeCount' => 45],
            ['userId' => 4, 'text' => 'Already migrated my project. Smooth upgrade process.', 'time' => '1h', 'likeCount' => 23],
            ['userId' => 6, 'text' => 'The performance improvements are noticeable right away. Great job team!', 'time' => '45m', 'likeCount' => 12],
            ['userId' => 1, 'text' => 'This pairs perfectly with Pest v4. The testing experience is next level.', 'time' => '30m', 'likeCount' => 67],
        ];
    }

    public static function formatCount(int $count): string
    {
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
