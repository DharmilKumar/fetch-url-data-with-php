<!DOCTYPE html>
<html>

<head>
    <style>
        .w {
            color: red;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <body>
        <?php
        require_once 'nav.php';
        require_once 'conn.php';
        $eNameErr = $teamErr = $sdateErr = $colorErr =  "";
        if (isset($_POST['submit'])) {
            if (!empty($_POST['event'])) {
                $eName = $_POST['event'];
            } else {
                $eNameErr = "Event Name is required";
            }
            if (!empty($_POST['team'])) {
                $teamName = $_POST['team'];
            } else {
                $teamErr = "Team Name is required";
            }

            if (!empty($_POST['color'])) {
                $color = $_POST['color'];
            } else {
                $colorErr = "Color is required";
            }
            if (!empty($_POST['sdate'])) {
                $sdate = $_POST['sdate'];
            } else {
                $sdateErr = "Date is required";
            }


            
            if (!empty($eName) && !empty($teamName) && !empty($color) && !empty($sdate)) {
                $sql = "INSERT INTO football(team,ename,sdate,color) VALUES ('$teamName','$eName','$sdate','$color')";
                if ($conn->query($sql)) {
                    echo "<script type='text/javascript'>alert('Match Registered!');window.location='match_create.php'</script>";
                } else {
                    echo "Error " . $conn->error;
                }
            }
        }

        ?>
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="event" class="form-label">Enter Event Name</label>
                        <input type="text" class="form-control" id="event" name="event">
                        <span class="w"><?php echo $eNameErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="team" class="form-label">Enter Team Name</label>
                        <input type="text" class="form-control" id="team" name="team">
                        <span class="w"><?php echo $teamErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Enter Team Color</label>
                        <input type="text" class="form-control" id="color" name="color">
                        <span class="w"><?php echo $colorErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="sdate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="sdate" name="sdate">
                        <span class="w"><?php echo $sdateErr; ?></span>
                    </div>


                    <button type="submit" name="submit" class="btn btn-primary">Register Team</button>
                </form>
            </div>
        </div>
    </body>

</html>