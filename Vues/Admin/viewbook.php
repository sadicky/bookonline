<?php
require_once('Models/Admin/connexion.php');
$db = getConnection();
$id =$_GET['id'];
    //Update Post Stats
    $Query = "SELECT * FROM tbl_doc_visits  WHERE doc_id = '$id'";
    $Result = $db->query($Query);
    if($Result->rowCount() > 0){
        $Query = "UPDATE tbl_doc_visits SET nbr_visit=nbr_visit+1 WHERE doc_id='$id'";
        $Result = $db->query($Query);
    } else {
        $Query = "INSERT INTO tbl_doc_visits(doc_id,nbr_visit) VALUES($id,1)";
        $Result = $db->query($Query);
    }
?>

<!-- /.panel-heading -->
<div class="row-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-bordered card-preview">
        <div class="card-inner">
          <?php 
        $contents = $data->book_file;
        $info = pathinfo($contents);
        $ver_ext = $info['extension'];
        
        if($ver_ext=='pdf'):?>
        <iframe src = "<?=$contents?>" width='100%' height='1200px' frameborder="0"></iframe>
        <?php endif; ?>
        <?php if($ver_ext=='docx'):?>
          <iframe src = "https://docs.google.com/gview?url=<?=urlencode($contents)?>embedded=true" width='100%' height='1200px' frameborder="0"></iframe>
        <?php endif ?>
        <?php if($ver_ext=='pptx'):?>
          <iframe src = "https://docs.google.com/gview?url=<?=urlencode($contents)?>embedded=true" width='100%' height='1200px' frameborder="0"></iframe>
        <?php endif ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->