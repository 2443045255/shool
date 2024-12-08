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
class SimpleCipher
{
  public string $key;
  public function __construct(string $key = null)
  {
    // throw new BadFunctionCallException("Please implement the SimpleCipher class!");
    if ($key === null) {
      $this->key = $this->generateRandomKey();
    } else {
      // 将密钥转为小写后检查是否只包含小写字母
      $lowerKey = strtolower($key);
      if ($lowerKey !== $key || !preg_match('/^[a-z]+$/', $key)) {
        throw new InvalidArgumentException("Key must only contain lowercase letters.");
      }
      $this->key = $lowerKey;
    }
  }
  public function encode(string $plainText): string
  {
    $cipherText = '';
    $keyLength = strlen($this->key);
    // 加密过程，逐个字符处理
    for ($i = 0; $i < strlen($plainText); $i++) {
      $plainChar = $plainText[$i];
      if (ctype_alpha($plainChar)) {
        $shift = ord($this->key[$i % $keyLength]) - ord('a'); // 根据密钥的字符计算移位
        $cipherChar = $this->shiftChar($plainChar, $shift);
        $cipherText .= $cipherChar;
      } else {
        // 非字母字符不变，直接加到结果中
        $cipherText .= $plainChar;
      }
    }
    return $cipherText;
  }
  public function decode(string $cipherText): string
  {
    $plainText = '';
    $keyLength = strlen($this->key);
    // 解密过程，逐个字符处理
    for ($i = 0; $i < strlen($cipherText); $i++) {
      $cipherChar = $cipherText[$i];
      if (ctype_alpha($cipherChar)) {
        $shift = ord($this->key[$i % $keyLength]) - ord('a');
        $plainChar = $this->shiftChar($cipherChar, -$shift); // 逆向移位解密
        $plainText .= $plainChar;
      } else {
        // 非字母字符不变，直接加到结果中
        $plainText .= $cipherChar;
      }
    }
    return $plainText;
  }
  private function shiftChar(string $char, int $shift): string
  {
    $base = ctype_lower($char) ? ord('a') : ord('A');
    return chr(($this->getShiftedCharCode(ord($char), $shift, $base)));
  }
  private function getShiftedCharCode(int $charCode, int $shift, int $base): int
  {
    // 对字母字符进行移位处理，确保在字母范围内
    return ($charCode - $base + $shift + 26) % 26 + $base;
  }
  private function generateRandomKey(int $length = 100): string
  {
    // 生成一个随机的字母密钥
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $key = '';
    for ($i = 0; $i < $length; $i++) {
      $key .= $alphabet[random_int(0, 25)];
    }
    return $key;
  }
}