<?php

namespace Shimoning\ArrUtils;

/**
 * 配列の便利関数的なやつ
 *
 * @author Shimon Haga <haga@shimon.biz>
 */
class Arr
{
    /**
     * 存在してれば OK
     *
     * @param mixed $value
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
            $callback = '\Shimoning\ArrUtils\Arr::exists';
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
            $callback = '\Shimoning\ArrUtils\Arr::exists';
        }

        foreach ($array as $index => $value) {
            if (!$callback($value, $index, $array)) {
                return false;
            }
        }
        return true;
    }

    /**
     * JavaScript の Array.find() 的なやつ
     * 配列のなかで条件を満たした最初のものを取り出す
     *
     * @param array $array
     * @param callable $callback
     * @return mixed
     */
    public static function first(array $array, callable $callback = null)
    {
        if ($callback === null) {
            $callback = '\Shimoning\ArrUtils\Arr::exists';
        }

        foreach ($array as $index => $value) {
            if (!$callback($value, $index, $array)) {
                return $value;
            }
        }
        return null;
    }

    /**
     * JavaScript の Array.find() 的なやつの最後を取り出す
     * 配列のなかで条件を満たした最後のものを取り出す
     *
     * @param array $array
     * @param callable $callback
     * @return mixed
     */
    public static function last(array $array, callable $callback = null)
    {
        if ($callback === null) {
            $callback = '\Shimoning\ArrUtils\Arr::exists';
        }

        $reversed = array_reverse($array ?? []);
        foreach ($reversed as $index => $value) {
            if (!$callback($value, $index, $array)) {
                return $value;
            }
        }
        return null;
    }

    /**
     * array_unique は遅いらしいので
     *
     * @param array $array
     * @param callable $callback
     * @return mixed
     */
    public static function unique(array $array, callable $callback = null)
    {
        return array_flip(array_flip($array));
    }
}
