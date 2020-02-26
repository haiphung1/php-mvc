<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background: #f8f8f8">
<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-6">
            <h3 class="text-center">Add form</h3>
            <form action="<?php echo BASE_URL . "save-form" ?>" method="POST">
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="title" placeholder="Title" required="required">
                    <span class="text-danger"><?php echo $errtitle ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Content <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control"
                              required="required" id="exampleFormControlTextarea1" rows="5" placeholder="Content" ></textarea>
                    <span class="text-danger"><?php echo $errcontent ?></span><br>
                </div>
                <div style="margin-left: 200px">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="<?php echo BASE_URL ?>" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>