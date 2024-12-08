<?php
/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */
declare(strict_types=1);
class Proverb
{
    public function recite(array $pieces): array
    {
        // throw new \BadMethodCallException(sprintf('Implement the %s method', __FUNCTION__));
        $lines = [];
        // 遍历数组，生成每一行
        $count = count($pieces);
        if ($count === 0) {
            return $lines;
        }
        for ($i = 0; $i < $count - 1; $i++) {
            $lines[] = "For want of a " . $pieces[$i] . " the " . $pieces[$i + 1] . " was lost.";
        }
        // 最后一行
        $lines[] = "And all for the want of a " . $pieces[0] . ".";
        return $lines;
    }
}
