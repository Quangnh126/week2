<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>ADMIN</title>
</head>

<body>

    

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="http://localhost/Tina_Demo/Week2/?action=homeAdmin" class="brand-link">
            <span class="brand-text font-weight-light">Demo Tina</span>
        </a>

        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="images/ptit.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="" class="d-block"><?= $_SESSION['auth']->name ?></a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <a href="http://localhost/Tina_Demo/Week2/?action=logout">Log Out</a>
            </div>



        </div>

    </aside>

    <div class="container content-wrapper col-md-10">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title  text-center">USER INFOMATION</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <a href=".?action=addUser" class="btn btn-success float-right" style="margin-bottom:10px;">ADD USER</a>
                    <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Telephone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $user) : ?>
                            <tr>
                                <td><?= $user->entity_id ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->gender ?></td>
                                <td><?= $user->telephone ?></td>
                                <td><?= $user->address ?></td>
                                <td>
                                    <a href="<?= base_path .'?action=editUser&id='. $user->entity_id ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?= base_path .'?action=deleteUser&id='. $user->entity_id ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>

    </div>

    </div>

    <?php


    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>

</html>