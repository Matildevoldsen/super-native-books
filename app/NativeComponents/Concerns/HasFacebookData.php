<?php

namespace App\NativeComponents\Concerns;

trait HasFacebookData
{
    /**
     * @return array<int, array{name: string, avatarUrl: string, coverUrl: string, bio: string, location: string, work: string, friendCount: int, hasStory: bool}>
     */
    public static function fbUsers(): array
    {
        return [
            [
                'name' => 'Mark Thompson',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbmark',
                'coverUrl' => 'https://picsum.photos/seed/fbcover1/800/300',
                'bio' => 'Living my best life. Coffee enthusiast and weekend hiker.',
                'location' => 'San Francisco, CA',
                'work' => 'Software Engineer at Meta',
                'friendCount' => 1247,
                'hasStory' => true,
            ],
            [
                'name' => 'Jessica Williams',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbjess',
                'coverUrl' => 'https://picsum.photos/seed/fbcover2/800/300',
                'bio' => 'Travel addict. Photographer. Dog mom.',
                'location' => 'Austin, TX',
                'work' => 'UX Designer at Spotify',
                'friendCount' => 892,
                'hasStory' => true,
            ],
            [
                'name' => 'David Park',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbdavid',
                'coverUrl' => 'https://picsum.photos/seed/fbcover3/800/300',
                'bio' => 'Foodie. Basketball. Building things.',
                'location' => 'Seattle, WA',
                'work' => 'Product Manager at Amazon',
                'friendCount' => 2134,
                'hasStory' => false,
            ],
            [
                'name' => 'Emily Rodriguez',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbemily',
                'coverUrl' => 'https://picsum.photos/seed/fbcover4/800/300',
                'bio' => 'Artist and yoga instructor. Spreading good vibes.',
                'location' => 'Portland, OR',
                'work' => 'Freelance Illustrator',
                'friendCount' => 567,
                'hasStory' => true,
            ],
            [
                'name' => 'Michael Chen',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbmichael',
                'coverUrl' => 'https://picsum.photos/seed/fbcover5/800/300',
                'bio' => 'Tech nerd. Runner. Dad of two.',
                'location' => 'New York, NY',
                'work' => 'CTO at StartupXYZ',
                'friendCount' => 3456,
                'hasStory' => false,
            ],
            [
                'name' => 'Sarah Miller',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbsarah',
                'coverUrl' => 'https://picsum.photos/seed/fbcover6/800/300',
                'bio' => 'Teacher by day, chef by night. Plant mama.',
                'location' => 'Chicago, IL',
                'work' => 'High School Teacher',
                'friendCount' => 734,
                'hasStory' => true,
            ],
            [
                'name' => 'James Wilson',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbjames',
                'coverUrl' => 'https://picsum.photos/seed/fbcover7/800/300',
                'bio' => 'Musician. Vinyl collector. Coffee snob.',
                'location' => 'Nashville, TN',
                'work' => 'Music Producer',
                'friendCount' => 1890,
                'hasStory' => false,
            ],
            [
                'name' => 'Olivia Brown',
                'avatarUrl' => 'https://i.pravatar.cc/150?u=fbolivia',
                'coverUrl' => 'https://picsum.photos/seed/fbcover8/800/300',
                'bio' => 'Marketing guru. Beach lover. Bookworm.',
                'location' => 'Miami, FL',
                'work' => 'Marketing Director at Nike',
                'friendCount' => 2567,
                'hasStory' => true,
            ],
        ];
    }

    /**
     * @return array<int, array{userId: int, text: string, imageUrl: string|null, time: string, reactions: int, comments: int, shares: int}>
     */
    public static function fbPosts(): array
    {
        return [
            [
                'userId' => 0,
                'text' => "Just got promoted to Senior Engineer! So grateful for this journey and everyone who supported me along the way. Here's to new challenges!",
                'imageUrl' => null,
                'time' => '2h',
                'reactions' => 234,
                'comments' => 45,
                'shares' => 12,
            ],
            [
                'userId' => 1,
                'text' => 'Beautiful sunset at the beach today. Sometimes you just need to stop and appreciate the moment.',
                'imageUrl' => 'https://picsum.photos/seed/fbsunset/800/600',
                'time' => '4h',
                'reactions' => 187,
                'comments' => 23,
                'shares' => 8,
            ],
            [
                'userId' => 3,
                'text' => "Just finished this commission piece! So happy with how it turned out. Oil on canvas, 24x36. Art really is therapy.",
                'imageUrl' => 'https://picsum.photos/seed/fbart/800/600',
                'time' => '6h',
                'reactions' => 312,
                'comments' => 67,
                'shares' => 34,
            ],
            [
                'userId' => 4,
                'text' => "Who else thinks remote work is here to stay? Our team has been fully remote for 3 years now and productivity has never been higher. The future of work is flexible.",
                'imageUrl' => null,
                'time' => '8h',
                'reactions' => 456,
                'comments' => 89,
                'shares' => 56,
            ],
            [
                'userId' => 5,
                'text' => "Made homemade pasta from scratch for the first time! Took forever but so worth it. Who wants the recipe?",
                'imageUrl' => 'https://picsum.photos/seed/fbpasta/800/600',
                'time' => '10h',
                'reactions' => 145,
                'comments' => 34,
                'shares' => 5,
            ],
            [
                'userId' => 2,
                'text' => "Game night with the crew! Nothing beats a good board game session with friends. Catan champions 3 years running.",
                'imageUrl' => 'https://picsum.photos/seed/fbgame/800/600',
                'time' => '12h',
                'reactions' => 98,
                'comments' => 15,
                'shares' => 2,
            ],
            [
                'userId' => 7,
                'text' => "Excited to announce I'll be speaking at the Digital Marketing Summit next month! Come say hi if you're attending. Early bird tickets still available.",
                'imageUrl' => null,
                'time' => '1d',
                'reactions' => 267,
                'comments' => 42,
                'shares' => 28,
            ],
            [
                'userId' => 6,
                'text' => "New single dropping Friday! Been working on this one for months. Can't wait for you all to hear it. Link in comments for the pre-save.",
                'imageUrl' => 'https://picsum.photos/seed/fbmusic/800/600',
                'time' => '1d',
                'reactions' => 534,
                'comments' => 78,
                'shares' => 45,
            ],
            [
                'userId' => 0,
                'text' => "Morning run through Golden Gate Park. 10K in under 50 minutes — new personal best! The fog was absolutely magical this morning.",
                'imageUrl' => 'https://picsum.photos/seed/fbrun/800/600',
                'time' => '2d',
                'reactions' => 167,
                'comments' => 29,
                'shares' => 3,
            ],
            [
                'userId' => 1,
                'text' => "Adopting this sweet girl today! Meet Luna, our new family member. She's already stolen all our hearts. Rescue dogs are the best.",
                'imageUrl' => 'https://picsum.photos/seed/fbdog/800/600',
                'time' => '2d',
                'reactions' => 892,
                'comments' => 134,
                'shares' => 67,
            ],
        ];
    }

    /**
     * @return array<int, array{userId: int, text: string, time: string, likes: int}>
     */
    public static function fbComments(): array
    {
        return [
            ['userId' => 2, 'text' => 'Congratulations! Well deserved, you have been crushing it!', 'time' => '1h', 'likes' => 15],
            ['userId' => 3, 'text' => 'So proud of you! This is amazing news!', 'time' => '1h', 'likes' => 8],
            ['userId' => 5, 'text' => 'The hard work pays off! Cheers to the next chapter.', 'time' => '45m', 'likes' => 5],
            ['userId' => 7, 'text' => "You're an inspiration! Keep going!", 'time' => '30m', 'likes' => 3],
            ['userId' => 6, 'text' => 'Awesome!! Drinks on you then haha', 'time' => '15m', 'likes' => 12],
        ];
    }

    public static function formatFbCount(int $count): string
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
