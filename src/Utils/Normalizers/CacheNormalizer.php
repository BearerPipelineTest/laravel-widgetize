<?php

namespace Imanghafoori\Widgets\Utils\Normalizers;

class CacheNormalizer
{
    /**
     * ّFigures out how long the cache life time should be.
     * @param object $widget
     * @return null
     */
    public function normalize($widget)
    {
        if (! property_exists($widget, 'cacheLifeTime')) {
            $widget->cacheLifeTime = (int) (config('widgetize.default_cache_lifetime', 0));
        }

        if ($widget->cacheLifeTime === 'forever' || $widget->cacheLifeTime < 0) {
            // 20.000 minutes is about 2 weeks which is long enough !
            $widget->cacheLifeTime = 20000;
        }
    }
}
