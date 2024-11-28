<?php
$title = 'Login';
include('Public/includes/header.php');
?>


<body class="nk-body bg-white npc-default pg-auth">

    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="#" class="logo-link">
                                 <img width="150px" src="assets/images/logo.jpg" srcset="assets/images/logo.jpg 2x" alt="logo">
                            </a>
                            <h4>BIBLIOTHEQUE VIRTUELLE</h4>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Connexion</h4>
                                    </div>
                                </div>
                                <form method="POST" id="login_form" class="form-validate is-alter" autocomplete="off">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Nom d'utilisateur</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text"  id="username" name="username" class="form-control form-control-lg" placeholder="Entrez votre nom d'utilisateur">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" id="pwd" name="pwd"  class="form-control form-control-lg" placeholder="Entrez ton mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block" name="login">Se Connecter</button>
                                    </div>
                                    <div>
                                        <?php
                                        // code...
                                        echo $msg;
                                        ?>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> N'avez vous pas un compte? <a href="<?=WEBROOT?>register">Creer ici </a></div>
                                <div class='col-sm-12' id="message"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
</body>

<?php
    include('Public/includes/footer.php');
    ?>
    <!-- app-root @e -->