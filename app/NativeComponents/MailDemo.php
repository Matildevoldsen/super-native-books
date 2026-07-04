<?php

namespace App\NativeComponents;

use Native\Mobile\Edge\NativeComponent;

/**
 * Mail-style inbox showcasing the full list-item interaction set:
 *   - Pull-to-refresh on the list
 *   - Leading swipe actions (mark read/unread, pin)
 *   - Trailing swipe actions (flag, delete with destructive role)
 *   - Tap-row press handler
 *
 * Every interaction maps to a SwiftUI / Compose native primitive.
 */
class MailDemo extends NativeComponent
{
    public array $emails = [];

    public int $refreshCount = 0;

    public function mount(): void
    {
        if (empty($this->emails)) {
            $this->emails = $this->seedEmails();
        }
    }

    public function navTitle(): string
    {
        return 'Inbox';
    }

    public function refresh(): void
    {
        $this->refreshCount++;
        // Prepend one fresh email so pull-to-refresh has a visible effect.
        array_unshift($this->emails, [
            'id'      => uniqid('mail_'),
            'from'    => 'Fresh sender',
            'subject' => 'Refreshed at '.now()->format('H:i:s'),
            'preview' => 'Pulled in via @refresh — refresh #'.$this->refreshCount,
            'unread'  => true,
            'pinned'  => false,
            'flagged' => false,
        ]);
    }

    public function toggleRead(string $id): void
    {
        $this->emails = array_map(function ($e) use ($id) {
            if ($e['id'] === $id) $e['unread'] = ! $e['unread'];
            return $e;
        }, $this->emails);
    }

    public function togglePin(string $id): void
    {
        $this->emails = array_map(function ($e) use ($id) {
            if ($e['id'] === $id) $e['pinned'] = ! $e['pinned'];
            return $e;
        }, $this->emails);
    }

    public function toggleFlag(string $id): void
    {
        $this->emails = array_map(function ($e) use ($id) {
            if ($e['id'] === $id) $e['flagged'] = ! $e['flagged'];
            return $e;
        }, $this->emails);
    }

    public function delete(string $id): void
    {
        $this->emails = array_values(array_filter(
            $this->emails,
            fn ($e) => $e['id'] !== $id,
        ));
    }

    public function open(string $id): void
    {
        // Tapping a row marks it as read.
        $this->emails = array_map(function ($e) use ($id) {
            if ($e['id'] === $id) $e['unread'] = false;
            return $e;
        }, $this->emails);
    }

    public function render(): \Illuminate\View\View
    {
        // Pinned emails float to the top; otherwise keep insertion order.
        // `usort` is unstable in PHP <8.0; we use a tuple sort that
        // injects the original index to keep secondary order stable.
        $indexed = [];
        foreach ($this->emails as $i => $e) {
            $indexed[] = [$i, $e];
        }
        usort($indexed, function ($a, $b) {
            $aPin = ! empty($a[1]['pinned']);
            $bPin = ! empty($b[1]['pinned']);
            if ($aPin !== $bPin) return $bPin <=> $aPin;  // pinned first
            return $a[0] <=> $b[0];                       // stable
        });
        $sorted = array_map(fn ($row) => $row[1], $indexed);

        return view('native.mail-demo', ['emails' => $sorted]);
    }

    private function seedEmails(): array
    {
        return [
            ['id' => '1', 'from' => 'GitHub',         'subject' => 'PR #842 was approved',           'preview' => 'shanerosenthal approved your changes…', 'unread' => true,  'pinned' => false, 'flagged' => false],
            ['id' => '2', 'from' => 'Stripe',        'subject' => 'Payout sent: $1,240.50',         'preview' => 'Your weekly payout has been initiated.', 'unread' => true,  'pinned' => false, 'flagged' => true],
            ['id' => '3', 'from' => 'Apple',          'subject' => 'Your invoice from Apple',        'preview' => 'iCloud+ 200GB — $2.99 monthly',          'unread' => false, 'pinned' => true,  'flagged' => false],
            ['id' => '4', 'from' => 'Sentry',         'subject' => 'New issue in laravel-mobile',    'preview' => 'TypeError: Cannot read property…',       'unread' => false, 'pinned' => false, 'flagged' => false],
            ['id' => '5', 'from' => 'Laravel News',   'subject' => 'Weekly digest',                  'preview' => 'Read about the latest from the community.', 'unread' => false, 'pinned' => false, 'flagged' => false],
            ['id' => '6', 'from' => 'Linear',         'subject' => '12 new updates in NPHP',         'preview' => 'A summary of activity from your team.',  'unread' => false, 'pinned' => false, 'flagged' => false],
            ['id' => '7', 'from' => 'Vercel',         'subject' => 'Deploy succeeded — production', 'preview' => 'Your project nph-marketing is live.',    'unread' => false, 'pinned' => false, 'flagged' => false],
            ['id' => '8', 'from' => 'Mom',            'subject' => 'Call me when you can ❤️',        'preview' => 'Just wanted to check in.',               'unread' => true,  'pinned' => true,  'flagged' => false],
            ['id' => '9', 'from' => 'TestFlight',     'subject' => 'NativePHP Demo is available',    'preview' => 'New beta build 1.2.3 is ready to test.', 'unread' => false, 'pinned' => false, 'flagged' => false],
            ['id' => '10', 'from' => 'Cloudflare',    'subject' => 'Suspicious login attempt',       'preview' => 'A new device tried to access your account.', 'unread' => false, 'pinned' => false, 'flagged' => false],
        ];
    }
}
