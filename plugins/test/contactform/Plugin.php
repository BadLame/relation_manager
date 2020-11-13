<?php namespace Test\Contactform;

use Backend;
use System\Classes\PluginBase;
use Test\Contactform\Components\ContactForm;

/**
 * contactform Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Contact Form',
            'description' => 'Test contact form plugin',
            'author'      => 'test',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Test\Contactform\Components\ContactForm' => 'contactForm',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'test.contactform.some_permission' => [
                'tab' => 'contactform',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'contactform' => [
                'label'       => 'contactform',
                'url'         => Backend::url('test/contactform/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['test.contactform.*'],
                'order'       => 500,
            ],
        ];
    }
}
