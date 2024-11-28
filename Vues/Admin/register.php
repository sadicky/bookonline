<?php
$title = 'Inscription';
include('Public/includes/header.php');
?>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>
    <div class="nk-app-root">

        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xl">
                        <div class="brand-logo pb-4 text-center">
                            <a href="#" class="logo-link">
                                
                            <h2 class="nk-block-title">BIBLIOTHEQUE ISC UVIRA</h2>
                                <!-- <img class="logo-light logo-img logo-img-lg" src="assets/images/logo2.png" srcset="assets/images/logo2.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="assets/images/logo2.png" srcset="assets/images/logo2.png 2x" alt="logo-dark"> -->
                            </a>
                        </div>
                        <div class="card card-bordered" style="background-color: rgba(0,128,128,0.5);">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Inscription</h4>
                                        <div class="nk-block-des">
                                            <p>Creer votre compte Lecteur</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="#" class="mt-2" id="formulaire_member">
                                    <div class="row g-gs">
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Nom</label>
                                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom du lecteur" required>
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Post-Nom</label>
                                                <input type="text" class="form-control" name="postnom" id="postnom" placeholder="Post-Nom du lecteur">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Prénom</label>
                                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom du lecteur">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Matricule</label>
                                                <input type="text" class="form-control" name="mat" id="mat" >
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Sexe</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="sexe" name="sexe" required>
                                                        <option value="">Select Sexe</option>
                                                        <option value="M">Homme</option>
                                                        <option value="F">Femme</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Type Membre</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="type" name="type">
                                                        <option value="">Select Membre</option>
                                                        <option value="I">Interne</option>
                                                        <option value="E">Externe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="f">
                                            <div class="form-group">
                                                <label class="form-label">Département</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="fac" name="fac">
                                                        <option value="">Select Membre</option>
                                                        <?php foreach ($getFac as $dep) { ?>
                                                            <option value='<?= $dep->fac_id ?>'><?= $dep->fac ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="d">
                                            <div class="form-group">
                                                <label class="form-label">Faculté</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="dep" name="dep"></select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="c">
                                            <div class="form-group">
                                                <label class="form-label">Promotion</label>
                                                <div class="form-control-wrap">
                                                    <select class="form-select js-select2" id="classe" name="classe"></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" id="pro">
                                            <div class="form-group">
                                                <label class="form-label">Promotion</label>
                                                <input type="text" class="form-control" id="promo" name="promo" />

                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="card">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">N° Carte D'Acces</label>
                                                <?php
                                                $string = "0123456789";
                                                $string = str_shuffle($string);
                                                $titre = substr($string, 0, 6);
                                                ?>
                                                <input type="text"  value="<?php echo 'B-ISC-' . $titre ?>" class="form-control" name="card" id="card" readonly>
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email@bookap.com">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Fonction</label>
                                                <input type="text" class="form-control" name="fonction" id="fonction" placeholder="Fonction">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="vil">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Ville</label>
                                                <input type="text" class="form-control" name="ville" id="ville" placeholder="Fonction">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Tél</label>
                                                <input type="text" class="form-control" name="tel" id="tel" placeholder="Tel">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="prov1">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Provenance</label>
                                                <input type="text" class="form-control" name="prov" id="prov" placeholder="Provenance">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="aut1">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Contact Autorité</label>
                                                <input type="text" class="form-control" name="aut" id="aut" placeholder="Contact Autorité">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-4" id="ad">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Adresse</label>
                                                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse du lecteur">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Password</label>
                                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="bed-no-add">Confirmer le Password</label>
                                                <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <!--col-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block" type="submit" data-bs-dismiss="modal">S'inscrire</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class='col-sm-12 my-4' id="messages"></div>
                                <div class="form-note-s2 text-center pt-4"> As-tu un compte? <a href="<?= WEBROOT ?>login">Connectez-vous ici</a>
                                </div>
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
    <?php
    include('Public/includes/footer.php');
    ?>