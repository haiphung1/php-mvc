<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List content</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="background: #f8f8f8">
    <div class="container pt-4">
        <div class="row">
            <div class="col">
                Hello: <span class="text-danger">
                    <?php
                        if ($_SESSION) {
                            echo $_SESSION['username'];
                        } else if ($_COOKIE) {
                            echo $_COOKIE['username'];
                        }
                    ?>
                </span>
                <a href="<?php echo BASE_URL . 'logout'?>">Logout</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col justify-content-center ">
                <a href="<?php echo BASE_URL . "add-form"?>" class="btn btn-sm btn-success mb-2"
                    style="float: right; margin-right: 60px">
                    Add Form
                </a>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col" style="width: 150px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $item) :?>
                    <tr>
                        <th scope="row"><?php echo $item->id ?></th>
                        <td><?php echo $item->title ?></td>
                        <td><?php echo $item->content ?></td>
                        <td>
                            <a href="<?php echo BASE_URL . "edit-form?id=$item->id "?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo BASE_URL . "remove-detail?id=$item->id "?>" class="btn btn-danger btn-sm btn-remove">Delete</a>
                        </td><?php endforeach; ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        $(document).ready(function(){
            $('.btn-remove').on('click', function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.value) {
                        var url = $(this).attr('href');
                        window.location.href = url;
                    }
                })
                return false;
            });
        });
    </script>

</body>
</html>