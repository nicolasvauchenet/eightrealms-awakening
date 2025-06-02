<?php

namespace App\Twig\Extensions;

use Symfony\Component\Asset\Packages;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ImageFromFixturesExtension extends AbstractExtension
{
    public function __construct(private readonly Packages $packages)
    {
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('insertFixturesImage', [$this, 'insertFixturesImage'], ['is_safe' => ['html']]),
        ];
    }

    public function insertFixturesImage(string $content): string
    {
        if(!str_contains($content, '{{image:')) {
            return $content;
        }

        return preg_replace_callback('/\{\{image:((?:[a-z0-9\-_]+:)?[a-z0-9\-_]+)\}\}/i', function($matches) {
            $parts = explode(':', $matches[1]);

            if(count($parts) === 2) {
                [$prefix, $slug] = $parts;
                $path = $this->packages->getUrl("img/{$prefix}/creature/{$slug}.png");
            } else {
                $slug = $parts[0];
                $path = $this->packages->getUrl("img/core/creature/{$slug}.png");
            }

            return sprintf(
                '<img src="%s" class="creature-thumb" alt="%s"/>',
                $path,
                ucfirst(str_replace('-', ' ', $slug))
            );
        }, $content);
    }
}
