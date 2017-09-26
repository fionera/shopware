<?php declare(strict_types=1);

namespace Shopware\ListingSorting\Struct;

use Shopware\Framework\Struct\Struct;

class ListingSortingBasicStruct extends Struct
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var bool
     */
    protected $active;

    /**
     * @var bool
     */
    protected $displayInCategories;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var string
     */
    protected $payload;

    /**
     * @var string
     */
    protected $label;

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function getDisplayInCategories(): bool
    {
        return $this->displayInCategories;
    }

    public function setDisplayInCategories(bool $displayInCategories): void
    {
        $this->displayInCategories = $displayInCategories;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): void
    {
        $this->payload = $payload;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }
}