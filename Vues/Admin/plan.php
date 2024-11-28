<?php
$title = 'Abonnements';
include('Public/includes/header.php');
?>

<div class="nk-content-body">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>
    <div class="nk-content-wrap m-4">
        <div class="nk-block">
            <div class="row g-gs">
                <?php foreach ($data as $d): ?>
                    <div class="col-md-4">
                        <div class="price-plan card card-bordered text-center">
                        <form action="Public/script/subscription.php" method="post">
                            <div class="card-inner">
                                <div class="price-plan-media">
                                    <img src="assets/images/icons/plan-s1.svg" width="100px" alt="">
                                    <input type="hidden" name="plan" value="<?= $d->id_plan ?>">
                                    <input type="hidden" name="email" value="<?= $_GET['email'] ?>">
                                </div>
                                <div class="price-plan-sucess">
                                    <h5 class="title"><?= $d->name ?></h5>
                                    <span class=" my-4"><?= $d->description ?></span>
                                </div>
                                <h4 class="price-plan-amount my-4">
                                    <div class="amount"><?= $d->prix ?> $ <span> / <?= $d->frequence ?></span></div>
                                </h4>
                                <div class="price-plan-action">
                                    <button type="submit" class="btn btn-primary btn-block">Choisir un Abonnement</button>
                                </div>
                            </div>
                            </form>
                        </div><!-- .price-item -->
                    </div><!-- .col -->
                <?php endforeach ?>
            </div><!-- .row -->
        </div><!-- .nk-block -->
    </div>
</div>
<!-- /.col-lg-12 -->

<?php
    include('Public/includes/footer.php');
    ?>