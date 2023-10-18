<html>

<head>
    <style>
        .img{
            width: 10px;
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <?php
    require_once 'nav.php';
    ?>

    <div class="card mx-auto mt-5" style="width: 30rem;">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="event" class="form-label">Enter Event Name</label>
                    <select class="dropdown show form-control" name="event" required>
                        <option class="dropdown-item " value="NPL" id="event" selected>NPL</option>
                        <option class="dropdown-item" value="MPL" id="event">MPL</option>
                        <option class="dropdown-item" value="APL" id="event">APL</option>
                        <option class="dropdown-item" value="SPL" id="event">SPL</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Show</button>
            </form>
        </div>
    </div>

    <?php

    require_once 'conn.php';
    $date =  date('Y-m-d');
    $sqldel = "DELETE FROM football WHERE sdate<'$date'";
    $conn->query($sqldel);

    if (isset($_POST['submit'])) {
        $event = $_POST['event'];

        $sql  = "SELECT * FROM football WHERE ename='$event'";
        $result = mysqli_query($conn, $sql);
        $count1 = 0;

    ?>
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
                        if ($ename == $event) {
                            $count1 += 1;

                            echo '
                    <td>' . $ename . '</td>
                    <td>' . $team . '</td>
                    <td>' . $sdate . '</td>                        
                    <td>' . '<i class="material-icons" style="font-size:60px;color:'.$color.';">palette</i>'. '</td>
                ';
                        }
                    ?>
                </tr>
        <?php

                    }
                    if ($count1 == 0) {
                        echo '<h2 class="text-center text-info">No Matches Found!</h2>';
                    }
                }

        ?>
            </tbody>
        </table>
</body>

</html>