<?php

declare(strict_types=1);

class Db
{
  public static string $tablename = "";
  public static string $where = "";
  public static PDO $pdo;
  public static PDOStatement|false $stmt;
  public static array|null $executeData;
  public static string $order = '';
  public static string $limit = '';
  public static string $field = '*';
  // 判断是否在where组内()
  private $isGrouping = false;
  // 记录一下闭包外层该使用AndOrNot
  private $whereAndOrNot = 'AND';

  private function __construct()
  {
    self::connect();
    self::setAttr();
  }

  private static function setAttr(): void
  {
    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }


  // 数据库连接方法
  public static function connect(): void
  {
    self::$where = "";
    self::$executeData = null;
    ~$DS = DIRECTORY_SEPARATOR;
    $config = require __DIR__ . "{$DS}..{$DS}config{$DS}database.php";
    $dbms = $config["dbms"];
    $host = $config["host"];
    $port = $config["port"];
    $dbName = $config["dbName"];
    $user = $config["user"];
    $pass = $config["pass"];
    $dsn = "$dbms:host=$host;port=$port;dbname=$dbName;charset=utf8";

    try {
      self::$pdo = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    } catch (PDOException $e) {
      throw new Exception("数据库连接错误:" . $e->getMessage());
    }
  }

  public static function table($tablename): Db
  {
    self::$tablename = $tablename;
    return new self();
  }

  public function where(array|Closure $condition, $andOrNot = 'AND'): Db
  {
    $where = '';
    if (!empty($condition)) {
      // 判断传入的是不是一个闭包
      if ($condition instanceof Closure) {
        $this->isGrouping = true;
        $this->whereAndOrNot = $andOrNot;
        $condition($this);
        $this->isGrouping = false;
        return $this;
      }
      // 拼接where
      // WHERE XXX
      $whereArray = [];
      $executeData = [];
      foreach ($condition as $key => $value) {
        echo $value[1];
        if (strtolower($value[1]) == 'between') {
          $whereArray[] = "$value[0] $value[1] ? AND ?";
          $executeData[] = $value[2][0];
          $executeData[] = $value[2][1];
        } else if (strtolower($value[1]) == 'in') {
          $str = rtrim(str_repeat("?,", count($value[2])), ",");
          $whereArray[] = "$value[0] $value[1] ($str)";
          foreach ($value[2] as $vv) {
            $executeData[] = $vv;
          }
        } else {
          $whereArray[] = "$value[0] $value[1] ?";
          $executeData[] = $value[2];
        }
      }
      if ($andOrNot !== 'NOT' && $andOrNot !== 'OR NOT') {
        $where = implode(" $andOrNot ", $whereArray);
      } else {
        if ($andOrNot == 'OR NOT') {
          //not (条件1 OR 条件2 OR 条件3 。。。。)
          $where = implode(" OR ", $whereArray);
        } else {
          //not (条件1 AND 条件2 AND 条件3 。。。。)
          $where = implode(" AND ", $whereArray);
        }
        // not的情况
        $where = 'NOT (' . $where . ')';
      }

      // 处理一下闭包在组内的情况
      if ($this->isGrouping) {
        $where = "( $where )";
      }

      if (isset(self::$executeData)) {
        self::$executeData = array_merge(self::$executeData, $executeData);
      } else {
        self::$executeData = $executeData;
      }
    }
    if ($this->isGrouping === true) {
      $this->buildWhere($where, $this->whereAndOrNot);
    } else {
      $this->buildWhere($where, $andOrNot);
    }
    return $this;
  }

  private function buildWhere(string $where, string $andOrNot = 'AND'): void
  {
    $oldWhere = self::$where;
    if ($where !== '') {
      if (strpos($oldWhere, 'WHERE') === false) {
        if ($oldWhere !== '') {
          $where = 'WHERE ' . $oldWhere . ' ' . $andOrNot . ' ' . $where;
        } else {
          $where = 'WHERE ' . $where;
        }
      } else {
        $where = $oldWhere . ' ' . $andOrNot . ' ' . $where;
      }
      self::$where = $where;
    }
  }

  public function whereOr(array|Closure $condition): Db
  {
    return $this->where($condition, 'OR');
  }

  public function whereNot(array|Closure $condition): Db
  {
    return $this->where($condition, 'NOT');
  }

  public function whereOrNot(array|Closure $condition): Db
  {
    return $this->where($condition, 'OR NOT');
  }


  public function whereNull(string $name): Db
  {
    $where = "$name is null";
    $this->buildWhere($where);
    return $this;
  }

  public function whereNotNull(string $name): Db
  {
    $where = "$name is not null";
    $this->buildWhere($where);
    return $this;
  }

  // 查询条件 field
  // field('id,username')
  public function field(string $fields): Db
  {
    self::$field = $fields;
    return $this;
  }

  public function select(): array|false
  {
    try {
      $sql = "SELECT " . self::$field . " FROM " . self::$tablename . " " . self::$where . " " . self::$order . " " . self::$limit;
      echo PHP_EOL;
      self::$stmt = self::$pdo->prepare($sql);
      if (isset(self::$executeData)) {
        self::$stmt->execute(self::$executeData);
      } else {
        self::$stmt->execute();
      }
      $result = self::$stmt->fetchAll(PDO::FETCH_ASSOC);

      // select是一个最终方法，因此在这里要把stmt关闭
      self::$stmt->closeCursor();
      return $result;
    } catch (PDOException $e) {
      throw new Exception("查询异常" . $e->getMessage());
    }
  }

  /**
   * 查询排序
   *
   * @param [string] 排序方式
   * @return Db
   */
  public function order(string $orderby): Db
  {
    self::$order = "order by " . $orderby;
    return $this;
  }

  /**
   * 查询条数限制
   *
   * @param int 查询数量或者起始偏移量
   * @param int|null 查询数量或null
   * @return Db
   */
  public function limit(int $num1, int $num2 = null): Db
  {
    self::$limit = "limit " . (is_null($num2) ? $num1 : "$num1,$num2");
    return $this;
  }

  /**
   * 查询一条
   *
   * @return array|boolean
   */
  public function find(): array|false
  {
    $result = $this->limit(1)->select();
    return isset($result[0]) ? $result[0] : false;
  }

  /**
   * 查询数据条数
   *
   * @return int
   */
  public function count(): int
  {
    // SELECT count(*) as total FROM users
    $totalArray = $this->field('count(*) as total')->find();
    return $totalArray["total"];
  }

  // 获取拼接的sql语句 getLastSql
  public function getLastSql(): string
  {
    return self::$stmt->queryString;
  }

  // 删除
  public function delete(): int
  {
    try {
      $sql = "DELETE FROM " . self::$tablename . " " . self::$where;

      self::$stmt = self::$pdo->prepare($sql);

      if (isset(self::$executeData)) {
        self::$stmt->execute(self::$executeData);
      } else {
        self::$stmt->execute();
      }
      $result = self::$stmt->rowCount();
      self::$stmt->closeCursor();
      return $result;
    } catch (PDOException $e) {
      throw new Exception("删除异常：" . $e->getMessage());
    }
  }

  /**
   * 插入数据
   *
   * @param array 要插入的数据数组 $datas []
   * @return int
   */
  public function insert(array $datas): int
  {
    try {
      if (empty($datas)) {
        throw new Exception("插入异常：缺少要插入的数据");
      }
      $keys = array_keys($datas);
      $executeData = array_values($datas);
      $str = rtrim(str_repeat('?,', count($datas)), ',');
      $sql = "INSERT INTO " . self::$tablename . " (" . implode(',', $keys) . ") VALUES ($str) ";

      self::$stmt = self::$pdo->prepare($sql);

      self::$stmt->execute($executeData);
      $result = self::$stmt->rowCount();
      self::$stmt->closeCursor();
      return $result;
    } catch (PDOException $e) {
      throw new Exception("插入异常：" . $e->getMessage());
    }
  }

  /**
   * 更新数据
   *
   * @param array 要更新的数据数组 $datas []
   * @return int
   */
  public function update(array $datas)
  {
    try {
      // UPDATE user SET username=2 WHERE id =2
      if (empty($datas)) {
        throw new Exception("修改异常：缺少要修改的数据");
      }
      $insertArr = [];
      $executeData = [];
      foreach ($datas as $key => $value) {
        $insertArr[] = $key . "=?";
        $executeData[] = $value;
      }
      $insertStr = implode(',', $insertArr);
      $sql = "UPDATE " . self::$tablename . " SET $insertStr " . self::$where;

      self::$stmt = self::$pdo->prepare($sql);
      if (isset(self::$executeData)) {

        $executeData = array_merge($executeData, self::$executeData);
      }
      self::$stmt->execute($executeData);
      $result = self::$stmt->rowCount();

      return $result;
    } catch (PDOException $e) {
      throw new Exception("修改异常：" . $e->getMessage());
    }
  }
}

$queryObj = Db::table("users");
$result = $queryObj->where([["id", '=', '3']])->update([
  "username" => "test",
]);
$sql = $queryObj->getLastSql();
echo 'sql语句: ' . $sql . PHP_EOL;
var_dump($result);
