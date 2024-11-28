<!-- /.col-lg-12 -->

<div class="nk-content-body">

    <div class='col-sm-12' id="message"></div>
    <div class='col-sm-12 my-4' id="messages"></div>
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">

            <div class="nk-block-head-content">
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#add-plan"><em class="icon ni ni-plus"></em><span>Nouveau Plan d'Abonnement</span></a>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-content-wrap">
        <div class="nk-block">
            <div class="row g-gs">
                <?php foreach ($data as $d): ?>
                    <div class="col-md-4">
                        <div class="price-plan card card-bordered text-center">
                            <div class="card-inner">
                                <div class="price-plan-media">
                                    <img src="assets/images/icons/plan-s1.svg" width="100px" alt="">
                                </div>
                                <div class="price-plan-sucess">
                                    <h5 class="title"><?= $d->name ?></h5>
                                    <span class=" my-4"><?= $d->description ?></span>
                                </div>
                                <h4 class="price-plan-amount my-4">
                                    <div class="amount"><?= $d->prix ?> $ <span> / <?= $d->frequence ?></span></div>
                                </h4>
                            </div>
                        </div><!-- .price-item -->
                    </div><!-- .col -->
                <?php endforeach ?>
            </div><!-- .row -->
        </div><!-- .nk-block -->
    </div>
</div>
<!-- /.col-lg-12 -->

<?php
include('Public/modals/addplan.php');
?>