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
        if(isset($id)==true){
            if ($id == "all") {
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo";        
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
            }
            elseif($id != "all") {
                //参照系SQL
                $sql = "SELECT * FROM usedcarInfo WHERE maker = ?";    
                //参照系SQLを発行    
                $statement = $pdo ->prepare($sql);
                $statement -> bindValue(1,$id);
                $statement -> execute();
            }else {
                echo('車がありません');
            }
        }

        //価格から探す
        if(isset($low_price)==true && isset($upper_price)==true){
            if ($low_price < $upper_price || $low_price == $upper_price) {
                $sql = "SELECT * FROM usedcarInfo WHERE price BETWEEN ? AND ? ORDER BY price";
                //参照系SQLを発行
                $statement = $pdo -> prepare($sql);
                $statement -> bindValue(1,$low_price);
                $statement -> bindValue(2,$upper_price); 
                $statement -> execute();
            }else{
                echo("車がありません");
            }
        }
        //走行距離から探す
        if (isset($mile) == true) {
            if($mile =="1"){
                $sql = "SELECT * FROM usedcarInfo WHERE mileage <= 1 ORDER BY mileage ASC";
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
            }elseif ($mile =="15") {
                $sql = "SELECT * FROM usedcarInfo WHERE mileage >= 15 ORDER BY mileage ASC";
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
            }
            else{
                $sql = "SELECT * FROM usedcarInfo WHERE mileage >= ? AND mileage <= ? ORDER BY mileage ASC";
                $statement = $pdo -> prepare($sql);
           
                switch ($mile) {
                    case "1~3":
                        $statement -> bindValue(1,1);
                        $statement -> bindValue(2,3);
                    break;
                    case "3~5":
                        $statement -> bindValue(1,3);
                        $statement -> bindValue(2,5);
                    break;
                    case "5~10":
                        $statement -> bindValue(1,5);
                        $statement -> bindValue(2,10);
                    break;
                    case "10~15":
                        $statement -> bindValue(1,10);
                        $statement -> bindValue(2,15);
                    break;
                    default:
                        echo("車がありません");
                    break;
                }
                $statement -> execute();
            }
        }
            //経過年数から探す
        if (isset($year) == true) {
            if($year =="1"){
                $sql = "SELECT * FROM usedcarInfo WHERE year <= 1 ORDER BY year ASC";
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
            }elseif ($year =="13") {
                $sql = "SELECT * FROM usedcarInfo WHERE year >= 13 ORDER BY year ASC";
                //参照系SQLを発行
                $statement = $pdo -> query($sql);
            }
            else{
                $sql = "SELECT * FROM usedcarInfo WHERE year >= ? AND year <= ? ORDER BY year ASC";
                $statement = $pdo -> prepare($sql);
            
                switch ($year) {
                    case "1~3":
                        $statement -> bindValue(1,1);
                        $statement -> bindValue(2,3);
                    break;
                    case "3~5":
                        $statement -> bindValue(1,3);
                        $statement -> bindValue(2,5);
                    break;
                    case "5~10":
                        $statement -> bindValue(1,5);
                        $statement -> bindValue(2,10);
                    break;
                    case "10~15":
                        $statement -> bindValue(1,10);
                        $statement -> bindValue(2,15);
                    break;
                    default:
                        echo("車がありません");
                    break;
                }
                $statement -> execute();
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
        echo("切断しました(error)<br/>");

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
    <div class="result">
<?php
    echo("<div>");
            //データの取得
            while ($row = $statement -> fetch()) {
                echo("<img src=./{$row[0]} alt={$row[2]}>");
                echo("{$row[1]}/");
                echo("{$row[2]}/");
                echo("{$row[3]}/");
                echo("{$row[4]}/");
                echo("{$row[5]}<br/>");
            }
    echo("</div>");
?>
    </div>
</body>
</html>