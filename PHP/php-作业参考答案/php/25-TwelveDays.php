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
class TwelveDays
{
  // 每一天送的礼物
  private const GIFTS = [
    "a Partridge in a Pear Tree",
    "two Turtle Doves",
    "three French Hens",
    "four Calling Birds",
    "five Gold Rings",
    "six Geese-a-Laying",
    "seven Swans-a-Swimming",
    "eight Maids-a-Milking",
    "nine Ladies Dancing",
    "ten Lords-a-Leaping",
    "eleven Pipers Piping",
    "twelve Drummers Drumming"
  ];
  private const ORDERS = [
    "",
    "first",
    "second",
    "third",
    "fourth",
    "fifth",
    "sixth",
    "seventh",
    "eighth",
    "ninth",
    "tenth",
    "eleventh",
    "twelfth"
  ];
  public function recite(int $start, int $end): string
  {
    $lyrics = [];
    // 循环遍历从 $start 到 $end 每一天的歌词
    for ($day = $start; $day <= $end; $day++) {
      // 获取当前的歌词前缀（今天的礼物）
      $currentGifts = array_slice(self::GIFTS, 0, $day);
      // 创建当日的歌词
      $verse = "On the " . self::ORDERS[$day] . " day of Christmas my true love gave to me: " .
        $this->formatGifts($currentGifts) . ".";
      // 添加到歌词集合中
      $lyrics[] = $verse;
    }
    // 返回所有歌词
    return implode("\n", $lyrics);
  }
  // 格式化礼物数组，将最后一个礼物前添加 'and'
  private function formatGifts(array $gifts): string
  {
    // 先逆序礼物数组
    $gifts = array_reverse($gifts);
    // 如果礼物数量大于1，则拼接时使用 ', and ' 连接最后一个
    if (count($gifts) > 1) {
      $lastGift = array_pop($gifts); // 取出最后一个礼物
      return implode(', ', $gifts) . ", and " . $lastGift; // 拼接
    }
    // 如果只有一个礼物，直接返回
    return $gifts[0];
  }
}
