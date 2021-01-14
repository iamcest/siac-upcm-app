    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row class="mt-4">
        <?php echo new Template('chat/parts/sidebar') ?>
        <v-col class="chat-container mt-6 py-0" cols="12" md="7" v-if="is_opened">
          <v-row>
            <v-col cols="12" class="pt-5 px-6 name-container">
              <template v-if="private_chat">
                <v-icon x-large v-if="opened_chat.avatar == '' || opened_chat.avatar == null">mdi-account-circle</v-icon>
                <v-avatar size="40" v-else>
                  <v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + opened_chat.avatar"></v-img>
                </v-avatar>
                {{ opened_chat.first_name }} {{ opened_chat.last_name }}             
              </template> 
              <template v-else>
                <v-icon x-large>mdi-account-group</v-icon>
                {{ opened_chat.group_name }}                
              </template> 
            </v-col>
          </v-row>
          <v-row id="chat_container" class="chat-box px-6 grey lighten-3">
            <template v-for="(v, i) in chat_copy">              
              <v-col cols="12">
              <h4 class="timeline text-center"><span class="text-capitalize">{{ formatDate(i) }}</span></h4>
              </v-col>
              <template v-for="msg in v">
                <v-col v-if="msg.sender != uid" cols="12">
                  <?php echo new Template('chat/parts/priv_receiver') ?>
                </v-col>
                <v-col v-else cols="12">
                  <?php echo new Template('chat/parts/priv_sender') ?>
                </v-col>
              </template>
            </template>
          </v-row>
          <?php echo new Template('chat/parts/chat_box') ?>
        </v-col>
        <?php echo new Template('chat/parts/profile_sidebar') ?>
      </v-row>
    </v-container>
  </v-main>