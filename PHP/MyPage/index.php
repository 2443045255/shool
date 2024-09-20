<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的博客</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>我的博客</h1>
        <nav>
            <?php
                $navArray = ["首页","关于我","博客文章","联系我"];
                foreach($navArray as $v){
                    echo <<<EOF
                        <a href="#">$v</a>
                    EOF;
                }
            ?>
        </nav>
    </header>
    <section class="section1">
        <div class="title">
            <h5>欢迎来到我的博客</h5>
            <p>这里是分享我的个人生活与技术知识的地方。</p>
        </div>
        <h2 class="mainTitle">最新文章</h2>
        <?php
        $pageArray = [
            array("文章标题一","2024年9月19日","这是第一篇博客的内容"),
            array("文章标题二","2024年9月19日","这是第一篇博客的内容")
        ];
        foreach($pageArray as $v){
            echo <<<EOF
                <div class="page">
                    <h2>$v[0]</h2>
                    <p>$v[1]</p>
                    <p>$v[2]</p>
                    <div class="button a">点击阅读</div>
                </div>
            EOF;
        }
        ?>
    </section>
</body>
</html>