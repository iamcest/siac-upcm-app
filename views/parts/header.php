
      <v-app-bar app flat class="py-5 header">
        <v-row>
          <v-col cols="12" md="4" class="">
            <v-img src="<?php echo SITE_URL ?>/public/img/Logo.png" width="40%">
              
            </v-img>
          </v-col>
          <?php if (isset($_SESSION['user_id'])): ?>
          <v-col cols="12" md="8" class="py-3 mt-n3 d-flex justify-end align-center">
            <v-avatar class="mr-2" size="3vw">
              <?php if (!empty($_SESSION['avatar'])): ?>
              <img src="<?php echo SITE_URL ?>/public/img/avatars/<?php echo $_SESSION['avatar'] ?>">

              <?php else: ?>
              <v-icon style="font-size: 3vw">mdi-account-circle</v-icon>
              <?php endif ?>
            </v-avatar>
            <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
          </v-col>
          <?php endif ?>
        </v-row>
      </v-app-bar>