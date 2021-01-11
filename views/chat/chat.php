    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row class="mt-4">
        <?php echo new Template('chat/parts/sidebar') ?>
        <v-dialog v-model="group_dialog" max-width="70%" >
          <v-card>
            <v-toolbar elevation="0">
              <v-toolbar-title>Crear grupo</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-toolbar-items>
              <v-btn icon dark @click="group_dialog = false">
                <v-icon color="grey">mdi-close</v-icon>
              </v-btn>
              </v-toolbar-items>
            </v-toolbar>
            
            <v-divider></v-divider>
            <v-form class="dialog_form">
              <v-row class="px-8">
                <v-col cols="12" sm="6">
                  <label>Nombre del grupo</label>
                  <v-text-field class="mt-3" v-model="group_form.group_name" outlined>
                  </v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <label>Seleccione los miembros de la unidad</label>
                  <v-select class="mt-3" v-model="group_form.members" :search-input.sync="search_member" :items="upcm_members" item-text="full_name" item-value="user_id" return-object multiple outlined>
                    <template v-slot:prepend-item>
                      <v-list-item>
                        <v-list-item-content>
                          <v-text-field v-model="search_member" placeholder="Buscar miembro" @input="searchMembers" outlined></v-text-field>
                        </v-list-item-content>
                      </v-list-item>
                    </template>
                  </v-select>
                </v-col>
              </v-row>
            </v-form>
            <v-card-actions class="px-8">
              <v-spacer></v-spacer>
              <v-btn color="secondary white--text" block @click="saveGroup" :loading="group_loading">
                Crear
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
        <v-col class="chat-container mt-6 py-0" cols="12" md="7" v-if="opened_chat.user_id != ''">
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
            <v-col cols="12">
              <h4 class="timeline text-center"><span>Hoy</span></h4>
            </v-col>
            <template v-for="msg in chat">
              <v-col v-if="msg.sender != uid" cols="12">
                <?php echo new Template('chat/parts/priv_receiver') ?>
              </v-col>
              <v-col v-else cols="12">
                <?php echo new Template('chat/parts/priv_sender') ?>
              </v-col>
            </template>
          </v-row>
          <?php echo new Template('chat/parts/chat_box') ?>
        </v-col>
        <?php echo new Template('chat/parts/profile_sidebar') ?>
      </v-row>
    </v-container>
  </v-main>