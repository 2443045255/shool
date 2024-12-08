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
class ResistorColorTrio
{
  // 颜色与数字的映射
  private const COLOR_CODES = [
    'black' => 0,
    'brown' => 1,
    'red' => 2,
    'orange' => 3,
    'yellow' => 4,
    'green' => 5,
    'blue' => 6,
    'violet' => 7,
    'grey' => 8,
    'white' => 9,
  ];
  private const UNIT_PREFIXES = [
    12 => 'teraoohms',
    9 => 'gigaohms',
    6 => 'megaohms',
    3 => 'kiloohms',
    0 => 'ohms'
  ];
  public function label(array $colors): string
  {
    // 获取前两个颜色的数字
    $mainValue = self::COLOR_CODES[$colors[0]] * 10 + self::COLOR_CODES[$colors[1]];

    // 获取第三个颜色表示的零的个数
    $zeros = self::COLOR_CODES[$colors[2]];

    // 计算电阻值
    $resistance = $mainValue * pow(10, $zeros);
    // 根据电阻值选择单位
    foreach (self::UNIT_PREFIXES as $exponent => $unit) {
      if ($resistance >= pow(10, $exponent)) {
        $resistance /= pow(10, $exponent);
        return sprintf('%.0f %s', $resistance, $unit);
      }
    }

    return sprintf('%d ohms', $resistance);
  }
}
