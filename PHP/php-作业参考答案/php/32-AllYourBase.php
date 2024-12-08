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
function rebase(int $fromBase, array $digits, int $toBase): array
{
  // throw new \BadFunctionCallException("Implement the rebase function");
  if ($fromBase < 2) {
    throw new \InvalidArgumentException("input base must be >= 2");
  }
  if ($toBase < 2) {
    throw new \InvalidArgumentException("output base must be >= 2");
  }
  foreach ($digits as $digit) {
    if ($digit < 0 || $digit >= $fromBase) {
      throw new \InvalidArgumentException("all digits must satisfy 0 <= d < input base");
    }
  }
  // 将原来的进制转换为十进制
  $decimalValue = 0;
  $numDigits = count($digits);
  for ($i = 0; $i < $numDigits; $i++) {
    $decimalValue += $digits[$i] * pow($fromBase, $numDigits - $i - 1);
  }

  // 将十进制数转换为目标进制
  if ($decimalValue === 0) {
    return [0]; // Special case: 0 in any base is just [0]
  }
  // 初始化结果数组
  $convertedDigits = [];
  // 辗转相除法
  while ($decimalValue > 0) {
    // Store the remainder (current digit)
    array_unshift($convertedDigits, $decimalValue % $toBase);
    // Divide by the target base for the next iteration
    $decimalValue = intdiv($decimalValue, $toBase);
  }
  return $convertedDigits;
}
