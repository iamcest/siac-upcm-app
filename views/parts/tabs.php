<?php 
/*
/* @var data
*/
 ?>
 <?php foreach ($data as $tab_item): ?>
      <v-tab-item transition="scroll-y-reverse-transition">
        <v-card flat>
          <?php echo new Template('tabs_components/'. $tab_item['template'] . '.php', Template::tabs())?>
        </v-card>
      </v-tab-item>
 <?php endforeach ?>