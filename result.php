<?php
    if(isset($_GET['id'])==true){
        $id = $_GET['id'];
    }
    else{
        echo('読み込めませんでした');
    }

    if (isset($_GET['low_price'])==true) {
        $low_price = $_GET['low_price'];
    }
    else{
        echo('読み込めませんでした');
    }

    if (isset($_GET['upper_price'])==true) {
        $upper_price = $_GET['upper_price'];
    }
    else{
        echo('読み込めませんでした');
    }


    try {
        //DB接続情報
        require_once('./DBInfo.php');
        //PDO::constructでRDBMSに接続
        $pdo = new PDO(DBInfo::DSN,DBInfo::USER,DBInfo::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo('接続しました<br/>');

        //メーカーから探す
        switch ($id) {
            case "all":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "benz":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'benz'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "bmw":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'bmw'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "vw":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'vw'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "audi":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'audi'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "mini":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'mini'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "porsche":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'porsche'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "volvo":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'volvo'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
                
                case "peugeot":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'peugeot'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
    
                case "lr":
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = 'lr'";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
                //データの取得
                while ($row = $statement -> fetch()) {
                    echo($row[0]);
                    echo($row[1]);
                    echo($row[2]);
                    echo($row[3]);
                    echo($row[4]);
                    echo("{$row[5]}<br/>");
                }
                break;
                                    
                default:
                ehcho('データがありません');
                break;
            }

        //価格から探す
        

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
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果 ページ</title>
</head>
<body>
<?php
    ?>
</body>
</html>