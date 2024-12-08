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
class Robot
{
  private ?string $name = null;
  private static array $usedNames = [];
  // 获取机器人名字
  public function getName(): string
  {
    // 如果名字为空，则生成一个新的名字
    if ($this->name === null) {
      $this->name = $this->generateUniqueName();
    }
    return $this->name;
  }
  // 重置机器人的名字
  public function reset(): void
  {
    $this->name = null;
  }
  // 生成唯一的名字
  private function generateUniqueName(): string
  {
    do {
      // 生成两个大写字母
      $letters = chr(rand(65, 90)) . chr(rand(65, 90));
      // 生成三个数字
      $digits = rand(100, 999);
      $newName = $letters . $digits;
    } while (in_array($newName, self::$usedNames)); // 确保名字唯一
    // 将生成的名字加入已用名字列表
    self::$usedNames[] = $newName;
    return $newName;
  }
}
