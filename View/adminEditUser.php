<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>Edit User</title>
</head>

<body>
    <div class="container content-header text-center">
        <h2>EDIT USER</h2>
        <?php if (!empty($message)) : ?>
            <?php foreach ($message as $message) : ?>
                <div class="alert alert-danger"><?= $message ?></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(!empty($this->view->res)): ?>
            <?php foreach ($this->view->res as $result) : ?>        
            <form class="row g-4" action=<?= "./?action=editUser&id=" .$result->entity_id ?> method="post">
                
                    <div class="col-md-8">
                        <label for="inputName" class="form-label">Username</label>
                        <label class="form-control" style="border: 0px !important;"><?= $result->username ?></label>
                    </div>
                    <div class="col-md-4">
                        <label for="inputName" class="form-label">Telephone</label>
                        <input type="tel" class="form-control" id="inputTel" name="telephone" value="<?= $result->telephone ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="name" value="<?= $result->name ?>">
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" value="<?= $result->address ?>">
                    </div>
                    <div class=" col-12">
                        <label>Gender</label>
                        <!-- <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="gridCheck" name="gender" value="male">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="gridCheck" name="gender" value="female">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <select name="gender" class="form-select text-center" aria-label="Default select example" style="width: 100px">
                                <option  value="<?= $result->gender ?>" selected> <?= $result->gender ?> </option>
                                <?php if($result->gender == 'male'): ?>
                                    <option value="female">female</option>
                                <?php else: ?>
                                    <option value = "male">male</option>
                                <?php endif; ?>
                            </select>
                        </div>


                    </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-success">UPDATE USER</button>
                </div>
                <div class="col-12">
                    <a href="<?= base_path .'?action=homeAdmin' ?>" class="btn btn-primary" >HOME</a>
                </div>
            </form>
            <?php endforeach; ?>
        <?php endif; ?> 
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>