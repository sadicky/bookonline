<div class="nk-content-body mt-0">
<?=$message?>
    <div class="nk-block nk-block-lg">
    <div class='col-sm-12 my-4' id="messages"></div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                    <form action="#" class="mt-2" method="post" id="formulaire_qty">
                        <div class="row g-gs">
                            
                            <!--col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="hidden" value="<?=$data->id_book?>" name="id" id="id">
                                        <input type="number" class="form-control" id="qty" name="qty" >
                                            
                                    </div>
                                </div>
                            </div>
                            <!--col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary"  type="submit">Ajouter</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->


</div>