<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果 ページ</title>
</head>
<body>
    <?php
        try {
            //DB接続情報
            require_once('./DBInfo.php');
            //PDO::constructでRDBMSに接続
            $pdo = new PDO(DBInfo::DSN,DBInfo::USER,DBInfo::PASSWORD);
            echo('接続しました<br/>');
        } catch (PDOException $e) {
            $code = $e->getcode();
            $message = $e->getMessage();
            echo("{$code}/{$message}<br/>");
        }//nullを代入して切断する
        $pdo = null;
        echo("切断しました<br/>");

        if(isset($_GET['id'])==true){
            $id = $_GET['id'];
        }
        else{
            echo('読み込めませんでした');
        }

        switch ($id) {
            case "all":
                echo('goodmorning');
                break;

                case "benz":
                echo('goodmorning');
                break;

                case "bmw":
                echo('goodmorning');
                break;

                case "vw":
                echo('goodmorning');
                break;

                case "audi":
                echo('goodmorning');
                break;

                case "mini":
                echo('goodmorning');
                break;

                case "porsche":
                echo('goodmorning');
                break;

                case "volvo":
                echo('goodmorning');
                break;
                
                case "peugeot":
                echo('goodmorning');
                break;
    
                case "lr":
                echo('goodmorning');
                break;
                                     
            default:
                ehcho('眠い');
                break;
        }
    ?>
</body>
</html>