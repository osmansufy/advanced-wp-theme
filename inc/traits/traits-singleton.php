<?php

/**
 * Singleton trait which implements Singleton pattern in any class in which this trait is used.
 *
 * Using the singleton pattern in WordPress is an easy way to protect against
 * mistakes caused by creating multiple objects or multiple initialization
 * of classes which need to be initialized only once.
 *
 * With complex plugins, there are many cases where multiple copies of
 * the plugin would load, and action hooks would load (and trigger) multiple
 * times.
 *
 * If you're planning on using a global variable, then you should implement
 * this trait. Singletons are a way to safely use globals; they let you
 * access and set the global from anywhere, without risk of collision.
 *
 * If any method in a class needs to be aware of "state", then you should
 * implement this trait in that class.
 *
 * If any method in the class need to "talk" to another or be aware of what
 * another method has done, then you should implement this trait in that class.
 *
 * If you specifically need multiple objects, then use a normal class.
 *
 * @package advancedwordpress
 */

namespace AW_THEME\Inc\Traits;

trait Singleton
{
    /**
     * Protected constructor to prevent creating a new instance of the
     * class via the `new` operator from outside of this class.
     *
     * @return void
     */
    protected function __construct()
    {
    }

    /**
     * Prevent the instance from being cloned (which would create a
     * second instance of it).
     *
     * @return void
     */
    final protected function __clone()
    {
    }

    /**
     * If the instance is a clone, prevent it from being unserialized
     * (which would create a second instance of it).
     *
     * @return void
     */
    final protected function __wakeup()
    {
    }

    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return object Singleton The *Singleton* instance.
     */
    final public static function get_instance()
    {

        // Store the class name in a variable to avoid rewriting it for each use.
        // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
        static $instance = [];

        /**
         * If this trait is implemented in a class which has multiple
         * sub-classes then static::$_instance will be overwritten with the most recent
         * sub-class instance. Thanks to late static binding
         * we use get_called_class() to grab the called class name, and store
         * a key=>value pair for each `classname => instance` in self::$_instance
         * for each sub-class.
         */
        $called_class = get_called_class();

        if (!isset($instance[$called_class])) {

            $instance[$called_class] = new $called_class();

            /**
             * Dependent items can use the `aquila_theme_singleton_init_{$called_class}` hook to execute code
             */
            do_action(sprintf('aw_theme_singleton_init_%s', $called_class)); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

        }
        // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
        return $instance[$called_class];
    }
}
