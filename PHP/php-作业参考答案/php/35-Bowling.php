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
class Game
{
  private array $rolls = [];
  private $isFrameFirst = true;
  public function roll(int $pins): void
  {
    if ($pins < 0 || $pins > 10) {
      throw new \InvalidArgumentException("pins数量不正确");
    }
    // 本次击中为1~9
    if ($pins > 0 && $pins < 10) {
      // 判断是不是本局的第一次投球
      if ($this->isFrameFirst) {
        $this->isFrameFirst = false;
      }
      // 第二次投球需要判断一下和是不是超过了10
      else {
        $this->isFrameFirst = true;
        if ($pins + $this->rolls[count($this->rolls) - 1] > 10) {
          throw new \InvalidArgumentException("pins数量不正确");
        }
      }
    }
    $this->rolls[] = $pins;
  }
  private function isTrueRolls(): bool
  {
    $this->rolls;
    // 比赛的局数
    $frames = 1;
    // 当前一局击倒的瓶子数量
    $currentSum = 0;
    $isFirst = true;
    $n = count($this->rolls);
    foreach ($this->rolls as $key => $pins) {
      // 超过局数
      if ($frames > 10) {
        return false;
      }
      // 如果是第十局
      if ($frames === 10) {
        // 这次击中了10个，则还有2次击球为正确
        if ($pins === 10 && ($key + 2 === $n - 1)) {
          // 判断一下额外的投球是不是合法的值
          if ($this->rolls[$key + 1] != 10 && $this->rolls[$key + 1] + $this->rolls[$key + 2] > 10) {
            return false;
          }
          return true;
        }
        // 没有击中十个的情况
        // 连续两次击中和为10，则还有一次投球为正确
        if ($key + 2 == $n - 1 && $pins + $this->rolls[$key + 1] === 10) {
          return true;
        }
        // 连续击中两次和小于10，没有额外投球为正确
        if ($key + 1 == $n - 1 && $pins + $this->rolls[$key + 1] < 10) {
          echo 2;
          return true;
        }
        // 其他情况错误
        return false;
      }
      // 全中，直接进入下一局
      if ($pins === 10) {
        $frames++;
        continue;
      }
      // 本次是第一次投球，没有全中
      if ($isFirst === true) {
        $isFirst = false;
        continue;
      }
      // 不是第一次投球
      if ($isFirst === false) {
        // 击倒的超过了10个
        if ($pins + $this->rolls[$key - 1] > 10) {
          return false;
        }
        $isFirst = true;
        $frames++;
      }
    }
    // 不符合局数的要求
    if ($frames !== 10) {
      return false;
    }
    return true;
  }
  public function score(): int
  {
    if (!$this->isTrueRolls()) {
      throw new \InvalidArgumentException("rolls数组出现了错误");
    }
    // score存储最后的得分
    $score = 0;
    $frameIndex = 0;
    for ($frame = 0; $frame < 10; $frame++) {
      if ($this->isStrike($frameIndex)) {
        $score += 10 + $this->strikeBonus($frameIndex);
        $frameIndex += 1; // Strike 只占一个投球
      } elseif ($this->isSpare($frameIndex)) {
        $score += 10 + $this->spareBonus($frameIndex);
        $frameIndex += 2; // Spare 占两个投球
      } else {
        $score += $this->sumOfBallsInFrame($frameIndex);
        $frameIndex += 2; // 普通局占两个投球
      }
    }
    return $score;
  }
  /**
   * 判断是否是全中（Strike）
   */
  private function isStrike(int $frameIndex): bool
  {
    return $this->rolls[$frameIndex] === 10;
  }
  /**
   * 判断是否是补中（Spare）
   */
  private function isSpare(int $frameIndex): bool
  {
    return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1] === 10;
  }
  /**
   * 计算全中的额外得分
   */
  private function strikeBonus(int $frameIndex): int
  {
    return $this->rolls[$frameIndex + 1] + $this->rolls[$frameIndex + 2];
  }
  /**
   * 计算补中的额外得分
   */
  private function spareBonus(int $frameIndex): int
  {
    return $this->rolls[$frameIndex + 2];
  }
  /**
   * 计算普通局的得分
   */
  private function sumOfBallsInFrame(int $frameIndex): int
  {
    return $this->rolls[$frameIndex] + $this->rolls[$frameIndex + 1];
  }
}
