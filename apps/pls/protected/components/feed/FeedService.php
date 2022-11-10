<?php

declare(strict_types=1);

namespace App\Components\Feed;

use Feed;
use Yii;

class FeedService implements FeedInterface
{

    public function fetchRss(string $type = FeedConst::FEED_TYPE_UPDATES, ?int $count = 5): array
    {
        try {
            Feed::$userAgent = Yii::app()->params['curlUserAgent'];
            Feed::$cacheDir = Yii::app()->params['latestUpdatesFeedCacheDir'];
            Feed::$cacheExpire = Yii::app()->params['latestUpdatesFeedCacheExp'];
            $url = $type == FeedConst::FEED_TYPE_BLOG ?
                Yii::app()->params['latestBlogFeedUrl'] :
                Yii::app()->params['latestUpdatesFeedUrl'];

            $feed = Feed::loadRss($url);

            if (empty($feed)) {
                return [];
            }
            $items = [];

            foreach ($feed->item as $item) {
                if ($count == 0) {
                    break;
                }
                $item->description = strip_tags($item->description);
                $item->description = trim(str_replace(' [&#8230;]', '', $item->description));
                $item->description = preg_replace('/The post.*appeared first on .*\./', '', $item->description);
                $items[] = $item;
                $count--;
            }

            return $items;
        } catch (\Exception $exception) {
            //TODO here log this message
            return [];
        }
    }

    public function fetchOne(string $type): array
    {
        $items = $this->fetchRss($type, 1);
        if (empty($items)) {
            return [];
        }

        return $items[0];
    }
}
