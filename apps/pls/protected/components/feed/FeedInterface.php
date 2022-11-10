<?php

declare(strict_types=1);

namespace App\Components\Feed;

interface FeedInterface
{
    public function fetchRss(string $type = FeedConst::FEED_TYPE_UPDATES, ?int $count = 5): array;
    public function fetchOne(string $type): array;
}