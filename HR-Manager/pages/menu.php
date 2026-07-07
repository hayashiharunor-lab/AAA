<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メニュー</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
        }

        .status {
            text-align: center;
            color: gray;
            margin-bottom: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 15px 0;
        }

        a {
            display: block;
            padding: 12px;
            background: #e9f0ff;
            border-radius: 6px;
            text-decoration: none;
            color: #333;
            transition: 0.2s;
        }

        a:hover {
            background: #cfe0ff;
        }

        .badge {
            float: right;
            font-size: 12px;
            color: white;
            background: #999;
            padding: 3px 8px;
            border-radius: 10px;
        }

        .active {
            background: #4caf50 !important;
            color: white;
        }
    </style>

</head>

<body>

<div class="container">

    <h1>HR-MANAGER</h1>

    <p class="status">現在：システム構築中（段階的に開発中）</p>

    <ul>

    <li>
        <a class="active" href="../modules/students/index.php">
            👥 生徒管理
            <span class="badge">稼働中</span>
        </a>
    </li>

    <li>
        <a href="../modules/education/index.php">
            🎓 教育管理
            <span class="badge">準備中</span>
        </a>
    </li>

    <li>
        <a href="../modules/partners/index.php">
            🤝 外部連携管理
            <span class="badge">準備中</span>
        </a>
    </li>

    <li>
        <a href="../modules/master/index.php">
            ⚙️ マスター管理
            <span class="badge">準備中</span>
        </a>
    </li>

</ul>

</div>

</body>
</html>