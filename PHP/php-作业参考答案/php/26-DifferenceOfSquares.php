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
function squareOfSum(int $max): int
{
  // throw new \BadFunctionCallException("Implement the squareOfSum function");
  // 使用公式：sum = n * (n + 1) / 2
  $sum = $max * ($max + 1) / 2;
  // 返回和的平方
  return $sum * $sum;
}
function sumOfSquares(int $max): int
{
  // throw new \BadFunctionCallException("Implement the sumOfSquares function");
  // 计算每个自然数的平方的和
  return ($max * ($max + 1) * (2 * $max + 1)) / 6;
}
function difference(int $max): int
{
  // throw new \BadFunctionCallException("Implement the difference function");
  // 平方和的差 = 和的平方 - 平方和的和
  return squareOfSum($max) - sumOfSquares($max);
}
