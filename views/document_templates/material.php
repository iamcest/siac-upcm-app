
<head>
</head>
<style type="text/css">
    @font-face {
      font-family: 'Gotham';
      src: url('public/fonts/Gotham-Book.ttf');
    }
    @font-face {
      font-family: 'Gotham';
      src: url('public/fonts/Gotham-Bold.otf');
      font-weight: bold;
      font-style: normal;
    }
    @font-face {
      font-family: 'Gotham';
      src: url('public/fonts/GothamRoundedMedium.ttf');
      font-weight: 500;
      font-style: normal;
    }
    *{
        font-family: "Gotham", DejaVu Sans;
    }
    header{
        position: inline-block;
    }
    .title{
        clear: both;
    }
    .text-center{
        text-align: center;
    }
    .text-right{
        text-align: right;
    }
    .titleDesc{
        color: #76d7d7;
    }
    .titles{
        margin-top: -20px;
    }
    .content{
        width: 95%;
        padding: 2%;
    }
    .d-flex{
        display:flex;
    }
    .justify-start{
        justify-content: start
    }
    .justify-center{
        justify-content: center
    }
    .justify-end{
        justify-content: end
    }
    .align-center {
        align-items: center;
    }
    h4{
        font-weight: 400 !important;
    }
</style>
<header class="" style="padding: 0% 2% 0% 2%">
    <div class="justify-start" style="width:25%">
        <img src="<?php echo DIRECTORY; ?>/public/img/upcms-logo/<?php echo $_SESSION['upcm_logo']; ?>" class="col-6" width="200px">
    </div>
    <div class="font-weight-normal titles text-right" style="width:100%;margin-top:-200px;">
        <h4 class='headerTitle'>
            <strong>Fecha: </strong><span class='titleDesc'><?php echo date("Y-m-d"); ?></span>
            <br>
        </h4>
        <h4 class='headerTitle'>
            <strong>Paciente: </strong><span><?php echo $data['full_name']?></span>
            <br>
        </h4>
        <h4 class='headerTitle'>
            <strong>Dr. </strong><span><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?></span>
            <br>
        </h4>
    </div>
    <div class="text-center" style="width:100%">
        <h2 class=""><?php echo $data['title']; ?></h2>
    </div>
</header>
<section class="content">
    <?php echo $data['content']; ?>
</section>