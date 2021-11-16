<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Codeigniter 4</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>

<body>
    <div class="container-fluid bg-purple shadow-sm">
        <div class="container pb-2 pt-3">
            <div class="text-white h4">CURD Codeigniter</div>
        </div>
    </div>

    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="nav-underline">
                    <div class="nav-link">Books / Create</div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('books') ?>" class="btn btn-primary">List</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Create Books</div>
                    </div>
                    <div class="card-body">
                        <form name="createForm" id="createForm" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Name" id="name" class="form-control <?php echo (isset($validation)&&$validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('name'); ?>">

                                <?php
                                    if(isset($validation)&&$validation->hasError('name')){
                                        echo '<p class="invalid-feedback">'. $validation->getError('name').'</p>';
                                    }
                                ?>

                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" placeholder="Author" id="author" class="form-control <?php echo (isset($validation)&&$validation->hasError('author')) ? 'is-invalid' : ''; ?>" value="<?php echo set_value('author'); ?>">

                                <?php
                                    if(isset($validation)&&$validation->hasError('author')){
                                        echo '<p class="invalid-feedback">'. $validation->getError('author').'</p>';
                                    }
                                ?>

                            </div>
                            <div class="form-group">
                                <label for="isbn_no">ISBN No</label>
                                <input type="text" name="isbn_no" placeholder="ISBN NO" id="isbn_no" class="form-control" value="">
                                <?php
                                    if(isset($validation)&&$validation->hasError('isbn_no')){
                                        echo '<p class="invalid-feedback">'. $validation->getError('author').'</p>';
                                    }
                                ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>