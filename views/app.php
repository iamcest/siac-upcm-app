<!DOCTYPE html>
<html lang="ES">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <link rel="shortcut icon" href="public/favicon/favicon.ico">
  <link href="<?php echo SITE_URL ?>/public/css/material-design-icons.min.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/public/css/vuetify.min.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/public/css/app.min.css" rel="stylesheet">
  <?php if (!empty($data['styles'])): ?>
    <?php foreach ($data['styles'] as $style): ?>
  <link href="<?php echo SITE_URL ?>/views/assets/css/<?php echo $style['name']; ?>.css" rel="stylesheet">
      
    <?php endforeach ?>
  <?php endif ?>
</head>
<body>

  <div id="siac-suite-container" style="display:none;">
    <v-app class="white">
      <?php if (!empty($data) AND !$data['header']): ?>
      <?php else: ?>
        <?php echo new Template('parts/header') ?>
      <?php endif ?>

      <?php echo $content; ?>

      <?php if (!empty($data) AND !$data['footer']): ?>
      <?php else: ?>
        <?php echo new Template('parts/footer') ?>
      <?php endif ?>
      
    </v-app>
  </div>
  <script>
    const uid = parseInt("<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>") 
  </script>
  <script src="<?php echo SITE_URL ?>/public/js/vue.min.js"></script>
  <script src="<?php echo SITE_URL ?>/public/js/components/vuetify.min.js"></script>
  <script src="<?php echo SITE_URL ?>/public/js/components/vue-resource.min.js"></script>
  <script src="<?php echo SITE_URL ?>/public/js/setup.min.js"></script>
  <?php if (!empty($data['scripts'])): ?>
    <?php foreach ($data['scripts'] as $script): ?>
  <script src="<?php echo SITE_URL ?>/views/assets/js/<?php echo $script['name'] ?>.js"></script>     
    <?php endforeach ?>
    <?php else: ?>
<script src="<?php echo SITE_URL ?>/views/assets/js/dashboard.js"></script>
  <?php endif ?>
</body>
</html>

