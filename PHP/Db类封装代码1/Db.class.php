<?php
class Db
{
  public static string $tablename = "";
  public static string $where = "";
  public static PDO $pdo;
  public static PDOStatement|false $stmt;
  public static array|null $executeData;

  private function __construct()
  {
    self::connect();
    self::setAttr();
  }

  private static function setAttr()
  {
    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }


  // 数据库连接方法
  public static function connect()
  {
    self::$where = "";
    self::$executeData = null;~
    $DS = DIRECTORY_SEPARATOR;
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
      throw new Exception("数据库连接错误:", $e->getMessage());
    }
  }

  public static function table($tablename)
  {
    self::$tablename = $tablename;
    return new self();
  }

  public function where(array $condition)
  {
    $where = '';
    if (!empty($condition)) {
      // 拼接where
      // WHERE XXX
      $whereArray = [];
      $executeData = [];
      foreach ($condition as $key => $value) {
        $whereArray[] = "$value[0] $value[1] ?";
        $executeData[] = $value[2];
      }
      $where = implode(" AND ", $whereArray);
      if (isset(self::$executeData)) {
        self::$executeData = array_merge(self::$executeData, $executeData);
      } else {
        self::$executeData = $executeData;
      }
    }
    $oldWhere = self::$where;
    if ($where !== "") {
      if (strpos($oldWhere, "WHERE") === false) {
        if ($oldWhere !== "") {
          $where = " WHERE " . $oldWhere . ' AND ' . $where;
        } else {
          $where =  " WHERE " . $where;
        }
      } else {
        $where = $oldWhere . ' AND ' . $where;
      }
      self::$where = $where;
    }
    return $this;
  }

  public function select()
  {
    $sql = "SELECT *" . " FROM " . self::$tablename . " " . self::$where;
    echo "SQL语句: " .  $sql . PHP_EOL;
    echo "executeData：";
    var_dump(self::$executeData);
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
  }
}

// 测试代码
// $result = Db::table("users")->where([
//   ["username", "=", "123"],
//   ["id", "=", "1"]
// ])->select();
// 测试用例1
$result = Db::table("users")->where([
  ["username", "=", "123"],
])->where([
  ["id", "=", "1"]
])->select();
var_dump($result);

// 测试用例2
$result = Db::table("users")->where([
  ["username", "like", "%12"],
])->where([
])->select();
var_dump($result);

// 测试用例3
$result = Db::table("users")->where([
  ["username", "like", "23%"],
])->where([
])->select();
var_dump($result);