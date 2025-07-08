<?php

namespace jeffbenusa\craftheadlessoauth;

use Craft;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use jeffbenusa\craftheadlessoauth\models\Settings;

/**
 * headless-oauth plugin
 *
 * @method static Plugin getInstance()
 * @method Settings getSettings()
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init(): void
    {
        $this->name = 'Headless OAuth';
        
        // Set alias for module path
        Craft::setAlias('@headlessoauth', __DIR__);
        
        // Set the controllerNamespace based on whether this is a console or web request
        if (Craft::$app->request->isConsoleRequest) {
            $this->controllerNamespace = '???\\console\\controllers';
        } else {
            $this->controllerNamespace = 'jeffbenusa\\headlessoauth\\controllers';
        }
        
        parent::init();

        $this->attachEventHandlers();

        // Any code that creates an element query or loads Twig should be deferred until
        // after Craft is fully initialized, to avoid conflicts with other plugins/modules
        Craft::$app->onInit(function() {
            // ...
        });
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('_headless-oauth/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
            'icon' => '@jeffbenusa\craftheadlessoauth\assets\img\HireJeffrey-Symbol-Teal.svg',
            
        ]);
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/5.x/extend/events.html to get started)
    }
}
