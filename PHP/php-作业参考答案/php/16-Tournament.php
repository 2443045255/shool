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
class Tournament
{
  // 保存所有的球队信息
  private array $teams = [];
  public function __construct()
  {
    // throw new BadFunctionCallException("Please implement the Tournament class!");
    // 初始化代码
  }
  public function tally(string $scores): string
  {
    // 按行分割输入数据
    $lines = explode("\n", $scores);
    foreach ($lines as $line) {
      $parts = explode(";", $line);
      if (count($parts) !== 3) {
        continue; // 如果行不符合格式，则跳过
      }
      list($team1, $team2, $result) = $parts;
      // 初始化球队数据
      $this->initializeTeam($team1);
      $this->initializeTeam($team2);
      // 根据比赛结果更新统计数据
      if ($result === 'win') {
        $this->updateResult($team1, 'win');
        $this->updateResult($team2, 'loss');
      } elseif ($result === 'loss') {
        $this->updateResult($team1, 'loss');
        $this->updateResult($team2, 'win');
      } elseif ($result === 'draw') {
        $this->updateResult($team1, 'draw');
        $this->updateResult($team2, 'draw');
      }
    }
    // 按照积分降序排序，积分相同的按字母顺序排序
    uasort($this->teams, function ($team1, $team2) {
      if ($team1['points'] === $team2['points']) {
        return strcmp($team1['name'], $team2['name']);
      }
      return $team2['points'] - $team1['points'];
    });
    // 构建输出的表格
    $output = "Team                           | MP |  W |  D |  L |  P\n";
    foreach ($this->teams as $team) {
      $output .= sprintf(
        "%-30s |  %d |  %d |  %d |  %d |  %d\n",
        $team['name'],
        $team['matchesPlayed'],
        $team['wins'],
        $team['draws'],
        $team['losses'],
        $team['points']
      );
    }
    // 移除最后多余的换行符
    return rtrim($output, "\n");
  }
  private function initializeTeam(string $team): void
  {
    if (!isset($this->teams[$team])) {
      $this->teams[$team] = [
        'name' => $team,
        'matchesPlayed' => 0,
        'wins' => 0,
        'draws' => 0,
        'losses' => 0,
        'points' => 0
      ];
    }
  }
  private function updateResult(string $team, string $result): void
  {
    $this->teams[$team]['matchesPlayed']++;

    if ($result === 'win') {
      $this->teams[$team]['wins']++;
      $this->teams[$team]['points'] += 3;
    } elseif ($result === 'draw') {
      $this->teams[$team]['draws']++;
      $this->teams[$team]['points'] += 1;
    } elseif ($result === 'loss') {
      $this->teams[$team]['losses']++;
    }
  }
}
