<?php

namespace App\NativeComponents\Concerns;

trait HasSpotifyData
{
    /**
     * @return array<int, array{name: string, imageUrl: string, followers: int, genre: string, bio: string, monthlyListeners: int}>
     */
    public static function spotifyArtists(): array
    {
        return [
            [
                'name' => 'The Weeknd',
                'imageUrl' => 'https://picsum.photos/seed/weeknd/400/400',
                'followers' => 98500000,
                'genre' => 'R&B/Pop',
                'bio' => 'Abel Tesfaye, known as The Weeknd, is a Canadian singer-songwriter and record producer known for his genre-blending style.',
                'monthlyListeners' => 112000000,
            ],
            [
                'name' => 'Taylor Swift',
                'imageUrl' => 'https://picsum.photos/seed/taylor/400/400',
                'followers' => 120000000,
                'genre' => 'Pop',
                'bio' => 'Taylor Swift is one of the best-selling music artists of all time, known for narrative songwriting and genre-spanning discography.',
                'monthlyListeners' => 89000000,
            ],
            [
                'name' => 'Drake',
                'imageUrl' => 'https://picsum.photos/seed/drake/400/400',
                'followers' => 85000000,
                'genre' => 'Hip-Hop',
                'bio' => 'Aubrey Drake Graham is a Canadian rapper, singer, and songwriter who has shaped modern hip-hop and R&B.',
                'monthlyListeners' => 78000000,
            ],
            [
                'name' => 'Dua Lipa',
                'imageUrl' => 'https://picsum.photos/seed/dualipa/400/400',
                'followers' => 45000000,
                'genre' => 'Pop/Dance',
                'bio' => 'Dua Lipa is an English-Albanian singer and songwriter known for her disco-influenced pop sound.',
                'monthlyListeners' => 67000000,
            ],
            [
                'name' => 'Kendrick Lamar',
                'imageUrl' => 'https://picsum.photos/seed/kendrick/400/400',
                'followers' => 52000000,
                'genre' => 'Hip-Hop',
                'bio' => 'Kendrick Lamar is an American rapper, songwriter, and record producer widely regarded as one of the most skilled lyricists of his generation.',
                'monthlyListeners' => 55000000,
            ],
            [
                'name' => 'Billie Eilish',
                'imageUrl' => 'https://picsum.photos/seed/billie/400/400',
                'followers' => 72000000,
                'genre' => 'Alt Pop',
                'bio' => 'Billie Eilish is an American singer-songwriter known for her whispery vocal style and genre-defying approach to pop music.',
                'monthlyListeners' => 61000000,
            ],
        ];
    }

    /**
     * @return array<int, array{name: string, description: string, coverUrl: string, creator: string, trackCount: int, isAlbum: bool}>
     */
    public static function spotifyPlaylists(): array
    {
        return [
            [
                'name' => "Today's Top Hits",
                'description' => 'The biggest songs right now. Updated every Friday.',
                'coverUrl' => 'https://picsum.photos/seed/sptop/400/400',
                'creator' => 'Spotify',
                'trackCount' => 50,
                'isAlbum' => false,
            ],
            [
                'name' => 'RapCaviar',
                'description' => 'New music from Drake, Kendrick, Future and more.',
                'coverUrl' => 'https://picsum.photos/seed/sprap/400/400',
                'creator' => 'Spotify',
                'trackCount' => 50,
                'isAlbum' => false,
            ],
            [
                'name' => 'Chill Vibes',
                'description' => 'Kick back with these chill tracks. Perfect for winding down.',
                'coverUrl' => 'https://picsum.photos/seed/spchill/400/400',
                'creator' => 'Spotify',
                'trackCount' => 80,
                'isAlbum' => false,
            ],
            [
                'name' => 'After Hours',
                'description' => 'The Weeknd',
                'coverUrl' => 'https://picsum.photos/seed/spafter/400/400',
                'creator' => 'The Weeknd',
                'trackCount' => 14,
                'isAlbum' => true,
            ],
            [
                'name' => 'Midnights',
                'description' => 'Taylor Swift',
                'coverUrl' => 'https://picsum.photos/seed/spmid/400/400',
                'creator' => 'Taylor Swift',
                'trackCount' => 13,
                'isAlbum' => true,
            ],
            [
                'name' => 'Workout Energy',
                'description' => 'High-energy tracks to power your workout.',
                'coverUrl' => 'https://picsum.photos/seed/spwork/400/400',
                'creator' => 'Spotify',
                'trackCount' => 60,
                'isAlbum' => false,
            ],
            [
                'name' => 'Discover Weekly',
                'description' => 'Your personal mixtape of fresh music. Enjoy!',
                'coverUrl' => 'https://picsum.photos/seed/spdisc/400/400',
                'creator' => 'Spotify',
                'trackCount' => 30,
                'isAlbum' => false,
            ],
            [
                'name' => 'Lofi Beats',
                'description' => 'Beats to study and relax to.',
                'coverUrl' => 'https://picsum.photos/seed/splofi/400/400',
                'creator' => 'Spotify',
                'trackCount' => 100,
                'isAlbum' => false,
            ],
        ];
    }

    /**
     * @return array<int, array{title: string, artistId: int, duration: string, plays: int}>
     */
    public static function spotifyTracks(): array
    {
        return [
            ['title' => 'Blinding Lights', 'artistId' => 0, 'duration' => '3:20', 'plays' => 4200000000],
            ['title' => 'Save Your Tears', 'artistId' => 0, 'duration' => '3:35', 'plays' => 2800000000],
            ['title' => 'Starboy', 'artistId' => 0, 'duration' => '3:50', 'plays' => 2600000000],
            ['title' => 'Anti-Hero', 'artistId' => 1, 'duration' => '3:21', 'plays' => 1900000000],
            ['title' => 'Cruel Summer', 'artistId' => 1, 'duration' => '2:58', 'plays' => 2100000000],
            ['title' => 'Lavender Haze', 'artistId' => 1, 'duration' => '3:22', 'plays' => 1200000000],
            ['title' => "God's Plan", 'artistId' => 2, 'duration' => '3:18', 'plays' => 2500000000],
            ['title' => 'One Dance', 'artistId' => 2, 'duration' => '2:54', 'plays' => 2900000000],
            ['title' => 'Levitating', 'artistId' => 3, 'duration' => '3:23', 'plays' => 2100000000],
            ['title' => "Don't Start Now", 'artistId' => 3, 'duration' => '3:03', 'plays' => 2400000000],
            ['title' => 'HUMBLE.', 'artistId' => 4, 'duration' => '2:57', 'plays' => 2000000000],
            ['title' => 'Bad Guy', 'artistId' => 5, 'duration' => '3:14', 'plays' => 2700000000],
            ['title' => 'Lovely', 'artistId' => 5, 'duration' => '3:20', 'plays' => 1800000000],
            ['title' => 'After Hours', 'artistId' => 0, 'duration' => '6:01', 'plays' => 1500000000],
            ['title' => 'In Your Eyes', 'artistId' => 0, 'duration' => '3:58', 'plays' => 1100000000],
        ];
    }

    /** @return array<string, string> */
    public static function spotifyGenres(): array
    {
        return [
            'Pop' => '#8C67AC',
            'Hip-Hop' => '#BA5D07',
            'Rock' => '#E61E32',
            'R&B' => '#DC148C',
            'Electronic' => '#148A08',
            'Latin' => '#E1118B',
            'Indie' => '#608108',
            'Country' => '#D84000',
            'Jazz' => '#477D95',
            'Podcasts' => '#006450',
            'Classical' => '#8C67AC',
            'Mood' => '#1E3264',
        ];
    }

    public static function formatSpotifyCount(int $count): string
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
