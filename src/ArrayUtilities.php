<?php

namespace Shimoning\ArrayUtilities;

/**
 * 配列の便利関数的なやつ
 *
 * @author Shimon Haga <haga@shimon.biz>
 */
class ArrayUtilities
{
    /**
     * 存在してれば OK
     *
     * @param any $value
     * @return bool
     */
    public static function exists($value): bool
    {
        return !empty($value);
    }

    /**
     * JavaScript の Array.some() 的なやつ
     * 配列のうちどれか一つでも条件を満たせば true
     *
     * @param array $array
     * @param callable $callback
     * @return bool
     */
    public static function some(array $array, callable $callback = null): bool
    {
        if ($callback === null) {
            $callback = self::exists;
        }

        foreach ($array as $index => $value) {
            if ($callback($value, $index, $array)) {
                return true;
            }
        }
        return false;
    }

    /**
     * JavaScript の Array.every() 的なやつ
     * 配列の全てが条件を満たす場合に true
     *
     * @param array $array
     * @param callable $callback
     * @return bool
     */
    public static function every(array $array, callable $callback = null): bool
    {
        if ($callback === null) {
            $callback = self::exists;
        }

        foreach ($array as $index => $value) {
            if (!$callback($value, $index, $array)) {
                return false;
            }
        }
        return true;
    }
}
