<?php declare(strict_types=1);

namespace Shopware\Product\Writer\Resource;

use Shopware\Framework\Write\Field\StringField;
use Shopware\Framework\Write\Flag\Required;
use Shopware\Framework\Write\Resource;

class ProductConfiguratorOptionTranslationResource extends Resource
{
    protected const PRODUCT_CONFIGURATOR_OPTION_UUID_FIELD = 'productConfiguratorOptionUuid';
    protected const LANGUAGE_UUID_FIELD = 'languageUuid';
    protected const NAME_FIELD = 'name';

    public function __construct()
    {
        parent::__construct('product_configurator_option_translation');

        $this->fields[self::PRODUCT_CONFIGURATOR_OPTION_UUID_FIELD] = (new StringField('product_configurator_option_uuid'))->setFlags(new Required());
        $this->fields[self::LANGUAGE_UUID_FIELD] = (new StringField('language_uuid'))->setFlags(new Required());
        $this->fields[self::NAME_FIELD] = (new StringField('name'))->setFlags(new Required());
    }

    public function getWriteOrder(): array
    {
        return [
            \Shopware\Product\Writer\Resource\ProductConfiguratorOptionTranslationResource::class,
        ];
    }

    public static function createWrittenEvent(array $updates, array $errors = []): \Shopware\Product\Event\ProductConfiguratorOptionTranslationWrittenEvent
    {
        $event = new \Shopware\Product\Event\ProductConfiguratorOptionTranslationWrittenEvent($updates[self::class] ?? [], $errors);

        unset($updates[self::class]);

        if (!empty($updates[\Shopware\Product\Writer\Resource\ProductConfiguratorOptionTranslationResource::class])) {
            $event->addEvent(\Shopware\Product\Writer\Resource\ProductConfiguratorOptionTranslationResource::createWrittenEvent($updates));
        }

        return $event;
    }
}