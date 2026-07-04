<?php

namespace App\NativeComponents\Concerns;

trait HasInstagramData
{
    /**
     * @return array<int, array{username: string, displayName: string, avatarUrl: string, bio: string, website: string, postCount: int, followers: int, following: int, isVerified: bool, hasStory: bool}>
     */
    public static function igUsers(): array
    {
        return [
            [
                'username' => 'natgeo',
                'displayName' => 'National Geographic',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=ignatgeo',
                'bio' => 'Experience the world through the eyes of National Geographic photographers.',
                'website' => 'natgeo.com/explore',
                'postCount' => 2847,
                'followers' => 283000000,
                'following' => 156,
                'isVerified' => true,
                'hasStory' => true,
            ],
            [
                'username' => 'chloe.travels',
                'displayName' => 'Chloe Park',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igchloe',
                'bio' => "Wanderlust addict. 42 countries and counting.\nPhotographer | Content Creator\nBookings: hello@chloepark.com",
                'website' => 'chloepark.com',
                'postCount' => 634,
                'followers' => 245000,
                'following' => 892,
                'isVerified' => true,
                'hasStory' => true,
            ],
            [
                'username' => 'foodie.jake',
                'displayName' => 'Jake Chen',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igjake',
                'bio' => "NYC food explorer. If it's delicious, I'll find it.\nFood blogger & recipe developer",
                'website' => 'jakeeats.com',
                'postCount' => 1203,
                'followers' => 89400,
                'following' => 1567,
                'isVerified' => false,
                'hasStory' => true,
            ],
            [
                'username' => 'minimal.home',
                'displayName' => 'Minimal Living',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igminimal',
                'bio' => "Less is more. Curating beautiful, intentional spaces.\nInterior Design | Decluttering Tips",
                'website' => 'minimalliving.co',
                'postCount' => 456,
                'followers' => 167000,
                'following' => 342,
                'isVerified' => false,
                'hasStory' => false,
            ],
            [
                'username' => 'alex.fitness',
                'displayName' => 'Alex Rivera',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igalex',
                'bio' => "NASM Certified PT | Nutrition Coach\nTransforming lives one rep at a time\nFree workout plans below",
                'website' => 'alexfit.io',
                'postCount' => 891,
                'followers' => 312000,
                'following' => 567,
                'isVerified' => true,
                'hasStory' => true,
            ],
            [
                'username' => 'sophia.art',
                'displayName' => 'Sophia Kim',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igsophia',
                'bio' => "Digital artist & illustrator\nCommissions: OPEN\nPrints available at link below",
                'website' => 'sophiakim.art',
                'postCount' => 378,
                'followers' => 52300,
                'following' => 723,
                'isVerified' => false,
                'hasStory' => true,
            ],
            [
                'username' => 'dev.marcus',
                'displayName' => 'Marcus Johnson',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igmarcus',
                'bio' => "Building cool stuff with code.\nSenior Dev @Stripe\nTech tips & dev life",
                'website' => 'marcus.dev',
                'postCount' => 234,
                'followers' => 28900,
                'following' => 445,
                'isVerified' => false,
                'hasStory' => false,
            ],
            [
                'username' => 'luna.pets',
                'displayName' => 'Luna & Friends',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=igluna',
                'bio' => "Golden Retriever mom. Three fur babies.\nDaily cuteness guaranteed.",
                'website' => '',
                'postCount' => 567,
                'followers' => 134000,
                'following' => 289,
                'isVerified' => false,
                'hasStory' => true,
            ],
        ];
    }

    /**
     * @return array<int, array{userId: int, imageUrl: string, caption: string, time: string, likes: int, commentCount: int, location: string|null}>
     */
    public static function igPosts(): array
    {
        return [
            [
                'userId' => 0,
                'imageUrl' => 'https://picsum.photos/seed/ignature1/800/800',
                'caption' => 'A lone polar bear navigates the thinning ice of Hudson Bay. As Arctic temperatures rise, these magnificent creatures face an uncertain future. Photo by @paulnicklen',
                'time' => '3h',
                'likes' => 892340,
                'commentCount' => 4523,
                'location' => 'Hudson Bay, Canada',
            ],
            [
                'userId' => 1,
                'imageUrl' => 'https://picsum.photos/seed/igtravel1/800/800',
                'caption' => "Golden hour in Santorini never gets old. This island has my whole heart. Who else has this on their bucket list?",
                'time' => '5h',
                'likes' => 34567,
                'commentCount' => 289,
                'location' => 'Santorini, Greece',
            ],
            [
                'userId' => 2,
                'imageUrl' => 'https://picsum.photos/seed/igfood1/800/800',
                'caption' => "This ramen spot in the East Village is criminally underrated. Rich tonkotsu broth, perfect noodles, and that egg though. Save this for your next NYC food crawl!",
                'time' => '7h',
                'likes' => 8923,
                'commentCount' => 134,
                'location' => 'East Village, NYC',
            ],
            [
                'userId' => 4,
                'imageUrl' => 'https://picsum.photos/seed/igfit1/800/800',
                'caption' => "Leg day is the best day. No debate. New PR on squats today — 405 lbs! Consistency beats everything. Drop your current squat PR below.",
                'time' => '9h',
                'likes' => 23456,
                'commentCount' => 567,
                'location' => null,
            ],
            [
                'userId' => 5,
                'imageUrl' => 'https://picsum.photos/seed/igart1/800/800',
                'caption' => "Just finished this piece after 40+ hours of work. Inspired by the ocean at night and bioluminescent waves. Prints now available — link in bio!",
                'time' => '11h',
                'likes' => 12890,
                'commentCount' => 234,
                'location' => 'Portland, OR',
            ],
            [
                'userId' => 7,
                'imageUrl' => 'https://picsum.photos/seed/igdog1/800/800',
                'caption' => "Someone discovered the sprinklers today and had the time of their life. Pure joy in dog form. Happy Tuesday from Luna!",
                'time' => '14h',
                'likes' => 45678,
                'commentCount' => 890,
                'location' => null,
            ],
            [
                'userId' => 3,
                'imageUrl' => 'https://picsum.photos/seed/ighome1/800/800',
                'caption' => 'Before and after of this living room transformation. Removed 80% of the furniture and it feels twice as big. Minimalism wins again.',
                'time' => '1d',
                'likes' => 19234,
                'commentCount' => 345,
                'location' => null,
            ],
            [
                'userId' => 1,
                'imageUrl' => 'https://picsum.photos/seed/igtravel2/800/800',
                'caption' => "Woke up above the clouds in the Swiss Alps. Moments like these remind you how small we are. This is why I travel.",
                'time' => '1d',
                'likes' => 67890,
                'commentCount' => 456,
                'location' => 'Zermatt, Switzerland',
            ],
            [
                'userId' => 6,
                'imageUrl' => 'https://picsum.photos/seed/igdev1/800/800',
                'caption' => "My desk setup evolution — 2020 vs 2025. From a folding table in a closet to this. If you're just starting out, keep going. It gets better.",
                'time' => '2d',
                'likes' => 5678,
                'commentCount' => 123,
                'location' => 'San Francisco, CA',
            ],
            [
                'userId' => 0,
                'imageUrl' => 'https://picsum.photos/seed/ignature2/800/800',
                'caption' => 'Deep in the Amazon rainforest, a jaguar pauses at the riverbank. These elusive cats are rarely photographed in the wild. Photo by @stevewinterphoto',
                'time' => '2d',
                'likes' => 1234567,
                'commentCount' => 8901,
                'location' => 'Amazon Rainforest, Brazil',
            ],
        ];
    }

    /**
     * @return array<int, array{userId: int, text: string, time: string, likes: int}>
     */
    public static function igComments(): array
    {
        return [
            ['userId' => 2, 'text' => 'Absolutely stunning shot! The lighting is incredible.', 'time' => '2h', 'likes' => 234],
            ['userId' => 5, 'text' => 'This is breathtaking. Nature is the greatest artist.', 'time' => '1h', 'likes' => 89],
            ['userId' => 1, 'text' => 'We need to protect these beautiful creatures!', 'time' => '45m', 'likes' => 156],
            ['userId' => 7, 'text' => 'Just made this my wallpaper. Incredible work.', 'time' => '30m', 'likes' => 45],
            ['userId' => 4, 'text' => 'The composition in this photo is perfect. Wow.', 'time' => '15m', 'likes' => 67],
        ];
    }

    /** @return array<string> */
    public static function igStoryHighlights(): array
    {
        return ['Travel', 'Food', 'BTS', 'Tips', 'Q&A', 'Collabs'];
    }

    public static function formatIgCount(int $count): string
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
