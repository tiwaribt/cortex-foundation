<?php

declare(strict_types=1);

namespace Cortex\Foundation\Overrides\Illuminate\Routing;

use Illuminate\Routing\UrlGenerator as BaseUrlGenerator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UrlGenerator extends BaseUrlGenerator
{
    /**
     * Generate a absolute URL to the given path.
     *
     * @param string    $path
     * @param mixed     $extra
     * @param bool|null $secure
     *
     * @return string
     */
    public function to($path, $extra = [], $secure = null)
    {
        return config('rinvex.cortex.route.locale_prefix')
            ? LaravelLocalization::localizeURL(parent::to($path, $extra, $secure))
            : parent::to($path, $extra, $secure);
    }

    /**
     * {@inheritdoc}
     */
    protected function routeUrl()
    {
        if (! $this->routeGenerator) {
            $this->routeGenerator = new RouteUrlGenerator($this, $this->request);
        }

        return $this->routeGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function previous($fallback = false)
    {
        return ($previousUrl = $this->request->input('previous_url')) ? $this->to($previousUrl) : parent::previous($fallback);
    }

    /**
     * {@inheritdoc}
     */
    protected function toRoute($route, $parameters, $absolute)
    {
        // Bind {locale} route parameter
        if (config('rinvex.cortex.route.locale_prefix') && ! isset($parameters['locale'])) {
            $parameters['locale'] = LaravelLocalization::getCurrentLocale();
        }

        return $this->routeUrl()->to(
            $route, $this->formatParameters($parameters), $absolute
        );
    }
}
