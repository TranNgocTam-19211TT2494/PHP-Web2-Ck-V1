<?php
require_once '../models/UserModel.php';
$userModel = new UserModel();

$user = '';
$id = NULL;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $user = $userModel->findUserById($id);//Update existing user
}

//Update existing user
if (!empty($_POST['submit'])) {
    if (!empty($_id)) {
        $userModel->updateUser($_POST);
    } else {
        echo "Sai người dùng";
    }
    header('location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>View</title>

    <?php include('../views/admin/layouts/head.php')?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include('../views/admin/layouts/header-mobile.php')?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->

        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-content--bgf7">
            <!-- HEADER DESKTOP-->
            <?php include('../views/admin/layouts/header-desktop.php')?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <?php if ($user || !empty($id)) { ?>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">User
                                        <?php if (!empty($user[0]['username'])) echo $user[0]['username'] ?></div>
                                    <div class="card-body card-block">
                                        <form method="post" class="">
                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Username</div>
                                                    <input type="text" id="username3" name="username"
                                                        value="<?php if (!empty($user[0]['username'])) echo $user[0]['username'] ?>"
                                                        class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Email</div>
                                                    <input type="email" id="email3" name="email"
                                                        value="<?php if (!empty($user[0]['email'])) echo $user[0]['email'] ?>"
                                                        class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Password</div>
                                                    <input type="text" id="password3" name="password"
                                                        value="<?php if (!empty($user[0]['password'])) echo $user[0]['password'] ?>"
                                                        class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Permission</div>
                                                    <input type="text" id="password3" name="permission"
                                                        value="<?php if (!empty($user[0]['permission'])) echo $user[0]['permission'] ?>"
                                                        class="form-control">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit"
                                                value="submit">Submit</button>
                                            <div class="form-actions form-group">
                                                <a href="admin.php" class="btn btn-primary btn-sm">Back</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-lg-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include('../views/admin/layouts/footer.php')?>

</body>

</html>
<!-- end document-->