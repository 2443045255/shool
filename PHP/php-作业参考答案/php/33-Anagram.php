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
function detectAnagrams(string $word, array $anagrams): array
{
  // throw new \BadFunctionCallException("Implement the detectAnagrams function");
  // 将目标单词标准化：排序字母并转为小写
  $normalizedWord = normalize($word);
  $results = [];
  foreach ($anagrams as $candidate) {
    if (strtolower($candidate) === strtolower($word)) {
      continue;
    }
    if (normalize($candidate) === $normalizedWord) {
      $results[] = $candidate;
    }
  }
  return $results;
}
/**
 * 对单词进行标准化：按字母顺序排列并转为小写
 */
function normalize(string $word): string
{
  $letters = str_split(mb_strtolower($word)); // 拆分为字母并转小写
  sort($letters); // 按字母顺序排序
  return implode('', $letters); // 重新组合成字符串
}
