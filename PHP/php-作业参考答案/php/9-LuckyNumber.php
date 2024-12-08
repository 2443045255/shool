<?php
class LuckyNumbers
{
  public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
  {
    // throw new \BadFunctionCallException("Implement the function");
    $num1 = (int) implode('', $digitsOfNumber1);
    $num2 = (int) implode('', $digitsOfNumber2);
    return $num1 + $num2;
  }
  public function isPalindrome(int $number): bool
  {
    // throw new \BadFunctionCallException("Implement the function");
    $str = (string)$number;
    $reversedStr = strrev($str);
    return $str === $reversedStr;
  }
  public function validate(string $input): string
  {
    // throw new \BadFunctionCallException("Implement the function");
    // 检查是否为空字符串
    if ($input === '') {
      return 'Required field';
    }
    // 尝试将输入转换为整型
    $number = (int) $input;

    // 检查输入是否是一个正整数
    if ($number <= 0) {
      return 'Must be a whole number larger than 0';
    }
    // 输入有效
    return '';
  }
}
