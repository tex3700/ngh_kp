<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\Palettes\PurplePalette;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use App\MoonShine\Resources\User\UserResource;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\Layout\Footer;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = PurplePalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make(UserResource::class, 'Users'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    protected function footer(): Footer
    {
        return Footer::make()
            ->copyright('&copy; ' . date('Y') . ' ❤️ <a href="https://nghim.ru" class="font-semibold text-purple hover:text-pink" target="_blank">ООО НефтеГазХим</a>')
            ->menu(['https://moonshine.cutcode.dev' => 'Documentation']); // пустой массив убирает ссылки документации
    }

    protected function getFooterMenu(): array
    {
        return [
            'https://getmoonshine.app/docs' => 'Documentation',
        ];
    }

    protected function getFooterCopyright(): string
    {
        return \sprintf(
            <<<'HTML'
                &copy; 2023-%d ❤️
                <a href="https://nghim.ru"
                    class="font-semibold text-primary"
                    target="_blank"
                >
                    ООО НефтеГазХим
                </a>
                HTML,
            now()->year,
        );
    }

    protected function getFooterComponent(): Footer
    {
        return Footer::make()
            ->copyright($this->getFooterCopyright())
            ->menu($this->getFooterMenu());
    }
}
