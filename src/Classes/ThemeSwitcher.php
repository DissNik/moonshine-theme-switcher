<?php

namespace AweUx\MoonshineTheme\Classes;

use Closure;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\Layout\LayoutBuilder;

class ThemeSwitcher
{
    static function make(Closure|string $label): ActionButton
    {
        return ActionButton::make(
            $label,
            route('moonshine-theme.update', ['uri' => moonshineRequest()->getRequestUri()])
        );
    }

    static function layoutBuilder(LayoutBuilder $layout): LayoutBuilder
    {
        if (request()->hasCookie(config('awe-ux-moonshine-theme.cookie.name'))) {
            $layout->bodyClass('moonshine-theme-minimalistic');
        }

        return $layout;
    }
}