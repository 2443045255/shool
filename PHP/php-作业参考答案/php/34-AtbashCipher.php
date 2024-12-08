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
function encode(string $text): string
{
  // throw new \BadFunctionCallException("Implement the encode function");
  $processedText = atbashTransform($text);
  // 按每5个字符分组
  return implode(' ', str_split($processedText, 5));
}
function decode(string $text): string
{
  // throw new \BadFunctionCallException("Implement the decode function");
  // 删除空格后进行转换
  return atbashTransform(str_replace(' ', '', $text));
}
/**
 * Atbash转换函数
 * 对字母进行反转，同时保留数字，去除非字母数字字符
 */
function atbashTransform(string $text): string
{
  $alphabet = range('a', 'z');
  $reversedAlphabet = array_reverse($alphabet);
  $transformation = array_combine($alphabet, $reversedAlphabet);
  $result = '';
  foreach (str_split(strtolower($text)) as $char) {
    if (ctype_alpha($char)) {
      $result .= $transformation[$char]; // 字母反转
    } elseif (ctype_digit($char)) {
      $result .= $char; // 保留数字
    }
    // 忽略非字母数字字符
  }
  return $result;
}
