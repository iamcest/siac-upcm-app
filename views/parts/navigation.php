<?php 
 ?>     
  <v-card>
    <v-toolbar
      flat
      color="primary"
      dark
    >
      <v-toolbar-title>Dashboard</v-toolbar-title>
    </v-toolbar>
    <v-tabs vertical>
      <?php foreach ($data as $tab): ?>
      <v-tab>
        <v-icon left>
          <?php echo $tab['icon'] ?>
        </v-icon>
        <?php echo $tab['name'] ?>
      </v-tab>      
      <?php endforeach ?>
      <?php echo new Template('parts/tabs.php', $data) ?>
    </v-tabs>
  </v-card>