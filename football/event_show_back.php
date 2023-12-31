<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <?php require_once 'nav.php';

    require_once 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['event'])) {
            $event = $_POST['event'];
        } else {
            $sdateErr = "Date is required";
        }
        if (!empty($_POST['sdate'])) {
            $sdate = $_POST['sdate'];
        } else {
            $sdateErr = "Date is required";
        }

        if (!empty($_POST['edate'])) {
            $edate = $_POST['edate'];
        } else {
            $edateErr = "Date is required";
        }
    }
    $date =  date('Y-m-d');
    $sqldel = "DELETE FROM football WHERE sdate<'$date'";
    $conn->query($sqldel);
    $sql  = "SELECT * FROM football WHERE sdate BETWEEN '$sdate' AND '$edate'";
    $result = mysqli_query($conn, $sql);
    $count = count(mysqli_fetch_row($result));
    $count1 = 0;

    ?>
    <h3 class="text-center">Event Name: <?php echo $event; ?>Match Date: <?php echo $sdate; ?> To <?php echo $edate; ?></h3>
    <table class="table mx-auto mt-5" style="width: 35rem;">
        <thead>
            <tr>
                <th scope="col">Event Name</th>
                <th scope="col">Team Name</th>
                <th scope="col">Match Date</th>
                <th scope="col">Color</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    $sdate = $row['sdate'];
                    $ename = $row['ename'];
                    $team = $row['team'];
                    $color = $row['color'];
                    
                    
                    // echo  $ename . " " . $event;
                    if($ename==$event){
                        if ($event == $ename) {
                            echo '
                            <td>' . $ename . '</td>
                            <td>' . $team . '</td>
                            <td>' . $sdate . '</td>                        
                            <td>' .'<span class="material-symbols-outlined" style="color:"'.$color.'",font-size="20px";">
                            laundry
                            </span>' . '</td>
                        ';
                        $count1+=1;
                        }
                    }
                ?>
            </tr>
        <?php

                }
                if($count1==0){
                    echo "<script type='text/javascript'>alert('No match found!');window.location='event_show.php'</script>";
                }

        ?>
        </tbody>
    </table>
    <span class="material-symbols-outlined" style="color:'red',font-size='20px';">
                        laundry
                        </span>
                        
<i class="material-icons" style="font-size:60px;color:red;">laundry</i>
</body>

</html>