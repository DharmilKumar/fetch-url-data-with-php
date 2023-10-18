<!DOCTYPE html>
<html>

<head>
    <style>
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
        ?>
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <form action="event_show_back.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="event" class="form-label">Enter Event Name</label>
                        <select class="dropdown show form-control" name="event" required>
                            <option class="dropdown-item " value="NPL" id="event" selected>NPL</option>
                            <option class="dropdown-item" value="MPL" id="event">MPL</option>
                            <option class="dropdown-item" value="APL" id="event">APL</option>
                            <option class="dropdown-item" value="SPL" id="event">SPL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sdate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="sdate" name="sdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="edate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="edate" name="edate" required>
                    </div>


                    <button type="submit" name="submit" class="btn btn-primary">Show</button>
                </form>
            </div>
        </div>



    </body>

</html>