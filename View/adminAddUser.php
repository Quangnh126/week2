<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <title>Add User</title>
</head>

<body>
    <div class="container content-header text-center">
        <h2>ADD USER</h2>
        <?php if (!empty($message)) : ?>
            <?php foreach ($message as $message) : ?>
                <div class="alert alert-danger"><?= $message ?></div>
            <?php endforeach; ?>
        <?php endif; ?>


        <form class="row g-4" action="./?action=addUser" method="post">
            <div class="col-md-8">
                <label for="inputName" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên user">
            </div>
            <div class="col-md-4">
                <label for="inputName" class="form-label">Telephone</label>
                <input type="tel" class="form-control" id="inputTel" name="telephone" placeholder="Nhập số điện thoại liên hệ">
            </div>
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Nhập tên tài khoản">
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Nhập mật khẩu">
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="confirm_password" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Hà Nội">
            </div>
            <div class="col-12">
                <label>Gender</label>
                <div>
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
                </div>

            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">ADD USER</button>
            </div>
            <div class="col-12">
                <a href="<?= base_path . '?action=homeAdmin' ?>" class="btn btn-primary">HOME</a>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>