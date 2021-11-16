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
                    <div class="nav-link">Books / View</div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="<?php echo base_url('books/create') ?>" class="btn btn-primary">ADD</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">

            <div class="col-md-12">
                <?php
                if (!empty($session->getFlashData('success'))) {
                ?>
                    <div class="alert alert-success">
                        <?php echo  $session->getFlashData('success'); ?>
                    </div>
                <?php
                }
                ?>

            <?php
                if (!empty($session->getFlashData('error'))) {
                ?>
                    <div class="alert alert-danger">
                        <?php echo  $session->getFlashData('error'); ?>
                    </div>
                <?php
                }
                ?>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-purple text-white">
                        <div class="card-header-title">Create Books</div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN NO</th>
                                <th width="150">Action</th>
                            </tr>
                            <?php if (!empty($books)) {
                                foreach ($books as $book) {


                            ?>
                                    <tr>
                                        <th><?php echo $book['id']; ?></th>
                                        <th><?php echo $book['title']; ?></th>
                                        <th><?php echo $book['author']; ?></th>
                                        <th><?php echo $book['isbn_no']; ?></th>
                                        <th>
                                            <a href="<?php echo base_url(('books/edit/'.$book['id'])); ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="#" onclick="deleteConfirm(<?php echo $book['id']; ?>);" class="btn btn-danger btn-sm">Delete</a>
                                        </th>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="5">Records Not Found</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function deleteConfirm(id){
        if(confirm('Are you sure you want to delete')){
            window.location.href="<?php echo base_url('books/delete/');?>/"+id;
        }
    }
</script>

</html>