
      <v-app-bar app flat class="py-5 header">
        <v-row>
          <v-col cols="12" md="4" class="">
            <v-img src="<?php echo SITE_URL ?>/public/img/Logo.png" :width="$vuetify.breakpoint.sm ? '20%' : '40%'"></v-img>
          </v-col>
          <v-col cols="12" md="8" class="py-3 mt-n3 d-flex justify-end align-center">
            <a class="mr-5 secondary--text" href="<?php echo SITE_URL ?>/community">SIAC Comunidad</a>
            <?php if (isset($_SESSION['user_id'])): ?>
              <?php if ($_SESSION['user_type'] == 'administrador'): ?>
              <a class="mr-5 secondary--text" href="<?php echo SITE_URL ?>/admin/">Panel</a>                
              <?php else: ?>
              <a class="mr-5 secondary--text" href="<?php echo SITE_URL ?>/suite/">Suite</a>
              <?php endif ?>
              <v-avatar class="mr-2" size="3vw">
                <?php if (!empty($_SESSION['avatar'])): ?>
                <img src="<?php echo SITE_URL ?>/public/img/avatars/<?php echo $_SESSION['avatar'] ?>">

                <?php else: ?>
                <v-icon style="font-size: 3vw">mdi-account-circle</v-icon>
                <?php endif ?>
              </v-avatar>
              <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?>
            <?php endif ?>
          </v-col>
        </v-row>
      </v-app-bar>