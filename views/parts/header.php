

      <v-app-bar app flat class="py-5 header">
        <v-row>
          <v-col cols="12" md="4" class="">
            <v-img src="<?php echo SITE_URL ?>/public/img/Logo.png" width="40%">
              
            </v-img>
          </v-col>
          <v-col cols="12" md="8" class="py-3 mt-n3 d-flex justify-end align-center">
            <v-avatar class="mr-2" size="3vw">
              <img src="<?php echo SITE_URL ?>/public/img/avatars/<?php echo $_SESSION['avatar'] ?>">
            </v-avatar>
            <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
          </v-col>
        </v-row>
      </v-app-bar>