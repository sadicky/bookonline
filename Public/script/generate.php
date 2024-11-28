<?php
require_once('../../Models/Admin/member.class.php');
require_once('../../Models/Admin/subscription.class.php');
$m = new Member();
$s = new Subscription();

$memberId = $_GET['id'];

$d = $m->getMemberId($memberId);
$u = $s->getSubscription($memberId);

// var_dump($u->nom);
// die();

if ($d) {
    $fin = date('d-m-Y',$u->fin) ;
    $debut = date('d-m-Y',$u->debut);
    $interval = intval($fin) - intval($debut);
    
    $membershipStatus = ($interval <= 0) ? 'Expired' : 'Active';
    // var_dump($membershipStatus);
    // die();
} else {
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carte d'Etudiant</title>
    <style>
        body {
            background: #222;
            padding: 2rem;
            font-family: helvetica;
        }

        .card {
            background: rgb(192, 178, 195);
            background: linear-gradient(36deg, rgba(192, 178, 195, 1) 0%, rgba(253, 243, 255, 1) 36%, rgba(246, 235, 248, 1) 64%, rgba(202, 187, 205, 1) 100%);
            border-radius: 10px;
            margin: auto;
            width: 500px;
            height: 280px;
            box-shadow: 2px 5px 15px 5px #00000030;
            display: flex;
            flex-flow: column;
            transition: all 1s;
        }

        .card:hover {
            box-shadow: 10px 10px 15px 5px #00000030;
        }

        img {
            width: 5rem;
            height: 4rem;
        }

        .title {
            display: flex;
            justify-content: space-between;
            flex-flow: row-reverse;
            padding: 0.5rem 1.5rem 0.5rem 1.5rem;
            text-transform: uppercase;
            font-size: 12px;
            color: #00000090;
        }

        .emboss {
            padding: 1rem 1.5rem 0 1.5rem;
            font-size: 18px;
            color: black;
            font-family: courier;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .emboss2 {
            padding: 1rem 1.5rem 0 10rem;
            font-size: 11px;
            color: black;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hologram {

            width: 6.5rem;
            /* Adjust the width as needed */
            height: 6.5rem;
            /* Adjust the height as needed */
            background-size: 400%;
            float: right;
            /* border-radius: 10px; */
            margin-left: auto;
            margin: -5rem 1.5rem 0 auto;
            /* animation: Gradient 15s ease infinite; */
        }

        .photo {
            width: 5rem;
            /* Adjust the width as needed */
            height: 5rem;
            /* Adjust the height as needed */
            border-radius: 50%;
            overflow: hidden;
            margin: 1rem;
            /* Adjust margin as needed */
            float: right;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @keyframes Gradient {
            0% {
                background-position: 30% 0%;
            }

            50% {
                background-position: 71% 100%;
            }

            100% {
                background-position: 30% 0%;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <span class="title">Carte de Lecteur </span>
        <!-- <span class='logo'><img  src="../../assets/images/logo2.png" alt='Logo'></span> -->
        <span class="emboss"><b>BookApp</b></span>
        <span class="emboss"><b>#<?php echo $d->matricule; ?></b></span>
        <span class="emboss"><?php echo $d->nom.' '.$d->prenom.' '.$d->postnom ;?></span>
        <div>
            <span class="emboss"><?php echo $d->email; ?>, <?php echo $d->tel; ?></span>

        </div>
        <div>
            <span class="emboss"><b>Type Abonnement: <?php echo $u->bouquet; ?></b></span>
            <?php if (!empty($u->photo)): ?>
                <?php $photoPath = '../../Public/Uploads/Membres/' . $u->photo; ?>
                <img src="<?php echo $u->photo; ?>" class="hologram" alt="Member Photo">
            <?php else: ?>
                <!-- Default photo if no photo is available -->
                <img src="../../Public/Uploads/default.jpg" alt="Default Photo">
            <?php endif; ?>
        </div>

        <div>
            <hr><small>
                <span class="emboss2">
                <?php       
                    $fin = date('d-m-Y',$u->fin) ;
                    $debut = date('d-m-Y',$u->debut);
                    echo 'Valide du <b>'. $debut.'</b> au <b>'. $fin.'</b>';?></span>
            </small>
        </div>

    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
<!-- Visit codeastro.com for more projects -->

</html>