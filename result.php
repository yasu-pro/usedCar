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
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo('接続しました<br/>');
    
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo";

                //参照系SQLを発行
                $statement = $pdo -> query($sql);

                //データの取得
                while($row = $statement -> fetch()){
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                $pdo = null;
                echo("切断しました<br/>");
    
    
        
            } catch (PDOException $e) {
                $code = $e->getcode();
                $message = $e->getMessage();
                echo("{$code}/{$message}<br/>");
                //nullを代入して切断する
                $pdo = null;
                echo("切断しました<br/>");

            }

        if(isset($_GET['id'])==true){
            $id = $_GET['id'];
        }
        else{
            echo('読み込めませんでした');
        }

        switch ($id) {
            case "all":
                echo('all');
                break;

                case "benz":
                echo('benz');
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