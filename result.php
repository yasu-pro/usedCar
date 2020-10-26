<?php
    if(isset($_GET['id'])==true ||
        isset($_GET['low_price'])==true ||
         isset($_GET['upper_price'])==true||
          isset($_GET['mile'])==true ||
          isset($_GET['year'])==true){
        $id = $_GET['id'];
        $low_price = $_GET['low_price'];
        $upper_price = $_GET['upper_price'];
        $mile = $_GET['mile'];
        $year = $_GET['year'];
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
                echo('データがありません');
                break;
        }

        //価格から探す
        if ($low_price < $upper_price) {
            $sql = "SELECT * FROM usedcarInfo WHERE price BETWEEN '" . $low_price . "' AND '" . $upper_price . "' ORDER BY price";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
            
        }elseif ($low_price == $upper_price) {
            $sql = "SELECT * FROM usedcarInfo WHERE price = '" . $low_price . "' ORDER BY price";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }

        //走行距離から探す
        if ($mile == "1") {
            $sql = "SELECT * FROM usedcarInfo WHERE mileage <= 1 ORDER BY mileage ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }

        }elseif($mile == "1~3") {
            $sql = "SELECT * FROM usedcarInfo WHERE mileage >= 1 AND mileage <=3 ORDER BY mileage ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($mile == "3~5") {
            $sql = "SELECT * FROM usedcarInfo WHERE mileage >= 3 AND mileage <=5 ORDER BY mileage ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($mile == "5~10") {
            $sql = "SELECT * FROM usedcarInfo WHERE mileage >= 5 AND mileage <=10 ORDER BY mileage ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($mile == "10~15") {
            $sql = "SELECT * FROM usedcarInfo WHERE mileage >= 10 AND mileage <=15 ORDER BY mileage ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($mile == "15") {
            $sql = "SELECT * FROM usedcarInfo WHERE mileage >= 15 ORDER BY mileage ASC";

            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }
            //経過年数から探す
        if ($year == "1") {
            $sql = "SELECT * FROM usedcarInfo WHERE year <= 1 ORDER BY year ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }

        }elseif($year == "1~3") {
            $sql = "SELECT * FROM usedcarInfo WHERE year >= 1 AND year <= 3 ORDER BY year ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($year == "4~5") {
            $sql = "SELECT * FROM usedcarInfo WHERE year >= 4 AND year <= 5 ORDER BY year ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($year == "6~8") {
            $sql = "SELECT * FROM usedcarInfo WHERE year >= 6 AND year <= 8 ORDER BY year ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($year == "9~12") {
            $sql = "SELECT * FROM usedcarInfo WHERE year >= 9 AND year <= 12 ORDER BY year ASC";
            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }
        }elseif($year == "13") {
            $sql = "SELECT * FROM usedcarInfo WHERE year >= 13 ORDER BY year ASC";

            //参照系SQLを発行
            $statement = $pdo -> query($sql);
            //データの取得
            while ($row = $statement -> fetch()) {
                echo($row[0]);
                echo($row[1]);
                echo($row[2]);
                echo("/{$row[3]}/");
                echo($row[4]);
                echo("{$row[5]}<br/>");
            }

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
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果 ページ</title>
</head>
<!-- 0:pass 1:number 2:maker 3:price 4:mileage 5:year -->
<body>
<?php

    ?>
</body>
</html>