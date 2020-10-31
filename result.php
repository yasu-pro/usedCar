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

        $not_img = true;

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
                $not_img = false;
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
                $not_img = false;
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
                       $not_img = false;
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
                    case "4~5":
                        $statement -> bindValue(1,4);
                        $statement -> bindValue(2,5);
                    break;
                    case "6~8":
                        $statement -> bindValue(1,6);
                        $statement -> bindValue(2,8);
                    break;
                    case "9~12":
                        $statement -> bindValue(1,9);
                        $statement -> bindValue(2,12);
                    break;
                    default:
                       $not_img = false;
                    break;
                }
                $statement -> execute();
            }
        }
        $pdo = null;



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
    <link rel="stylesheet" href="./css/result.css">
    <title>検索結果 ページ</title>
</head>
<!-- 0:pass 1:number 2:maker 3:price 4:mileage 5:year -->
<body>
    <div class="result">
        <h1>検索結果</h1>
        <p>※画像をクリックすると拡大できます</p>
<?php
        if($not_img === false) {
            echo('車がありません');
        }

    echo("<div class='resultDate'>");
                $i = 0;
                //データの取得
            while ($row = $statement -> fetch()) {
                echo("<div class='imgBoxes'>");
                    echo('<div class=imgBox>');
                        echo("<img id=$row[2]$i src=./{$row[0]} alt=$row[2]>");
                    echo('</div>');
                    echo("<div class=carInfo>");
                        echo("<p>車種：$row[2]</p>");
                        echo("<p>価格：$row[3]</p>");
                        echo("<p>走行距離：$row[4]</p>");
                        echo("<p>経過年数：$row[5]</p>");
                    echo("</div>");
                echo("</div>");
                $i++;
            }
    echo("</div>");

?>
    <div class="display_none" id="popUp">
        <div class="popUp_area">
            <img id="popUp_img">
            <button id="popUp_close">閉じる</button>
        </div>
    </div>

    </div>
    <script src="./fadeInOut.js"></script>
</body>
</html>