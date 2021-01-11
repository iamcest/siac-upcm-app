
        <v-col cols="12" md="3" class="pt-6 pl-0 pr-0" v-if="opened_chat.user_id != ''">
          <v-row class="profile-container ml-0">
            <v-col cols="12" class="py-6 text-center" v-if="private_chat">Perfil</v-col>
            <v-col cols="12" class="py-6 text-center" v-else>Información del grupo</v-col>
          </v-row>
          <v-row class="ml-0">
            <template v-if="private_chat">
              <v-col cols="12" class="d-flex justify-center">
                <v-icon class="avatar-profile" v-if="opened_chat.avatar == '' || opened_chat.avatar == null">mdi-account-circle</v-icon>
                <v-avatar size="90" v-else>
                  <v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + opened_chat.avatar"></v-img>
                </v-avatar>
              </v-col>
              <v-col cols="12" class="text-center mt-n4">
                <p class="font-weight-bold">{{ opened_chat.first_name }} {{ opened_chat.last_name }}</p>
                <p class="mt-n4 subtitle-1 grey--text">{{ opened_chat.rol }}</p>
              </v-col>
              <v-col class="mt-n5" cols="12"><p class="text-center">Email: <span class="grey--text">{{ opened_chat.email }}</span></p></v-col>
              <v-col class="mt-n5" cols="12" v-if="opened_chat.telephone != null || opened_chat.telephone != ''"><p class="text-center">Teléfono: <span class="grey--text">{{ opened_chat.telephone }}</span></p></v-col>
            </template>
            <template v-else>
              <v-col cols="12" class="d-flex justify-center">
                <v-icon class="avatar-profile">mdi-account-group</v-icon>
              </v-col>
              <v-col cols="12" class="text-center mt-n4">
                <p class="font-weight-bold">{{ opened_chat.group_name }}</p>
              </v-col>             
            </template>
            <v-col class="files_container" cols="12">

              <v-tabs class="px-0 files-tabs" v-model="tab" fixed-tabs>
                <v-tab class="text-capitalize" v-model="tab" href="#files">
                  Archivos
                </v-tab>

                <v-tab class="text-capitalize" href="#my-files">
                  Mis archivos 
                </v-tab>
              </v-tabs>
              <v-tabs-items v-model="tab">
                <v-tab-item transition="scroll-y-reverse-transition" :value="'files'">
                  <v-row class="ml-0 mr-0 pr-0" v-for="file in chat" v-if="file.file !== '' && file.file !== null && file.file !== 'null'">
                    <v-col cols="2">
                      <v-icon v-if="getExt(file.file) == 'png' || getExt(file.file) == 'jpg' || getExt(file.file) == 'jpeg'" @click="prevImage(file.file, file.message)" x-large>mdi-file-image</v-icon>
                      <v-icon v-else x-large>mdi-file-{{ getExtIcon(file.file) }}-box</v-icon>
                    </v-col>
                    <v-col cols="10">
                      <template v-if="private_chat">
                        <p class="file-description"><a class="grey--text text--darken-1" :href="'<?php echo SITE_URL ?>/public/media/chat/' + file.file" download>{{ file.file }}</a></p>
                        <p class="mt-n3 file-description"><span class="primary--text" v-if="file.sender == uid">Yo</span> <span class="primary--text" v-else>{{ opened_chat.first_name }} {{ opened_chat.last_name }}</span> {{ file.message_date }} {{ getTimeHour(file.message_date + " " + file.message_time) }}</p>                        
                      </template>
                      <template v-else>
                        <p class="file-description"><a class="grey--text text--darken-1" :href="'<?php echo SITE_URL ?>/public/media/group_chat/' + file.file" download>{{ file.file }}</a></p>
                          <p class="mt-n3 file-description"><span class="primary--text" v-if="file.sender == uid">Yo</span> <span class="primary--text" v-else>{{ file.first_name }} {{ file.last_name }}</span> {{ file.message_date }} {{ getTimeHour(file.message_date + " " + file.message_time) }}</p>   
                      </template>

                    </v-col>
                  </v-row>
                </v-tab-item>
                <v-tab-item transition="scroll-y-reverse-transition" :value="'my-files'">
                  <template v-for="file in chat" v-if="file.file !== '' && file.file !== null && file.file !== 'null' ">
                    <v-row class="ml-0 mr-0 pr-0" v-if="file.sender == uid">
                      <v-col cols="2">
                        <v-icon v-if="getExt(file.file) == 'png' || getExt(file.file) == 'jpg' || getExt(file.file) == 'jpeg'" @click="prevImage(file.file, file.message)" x-large>mdi-file-image</v-icon>
                        <v-icon v-else x-large>mdi-file-{{ getExtIcon(file.file) }}-box</v-icon>
                      </v-col>
                      <v-col cols="10">
                        <p class="file-description"><a class="grey--text text--darken-1" :href="'<?php echo SITE_URL ?>/public/media/chat/' + file.file" download>{{ file.file }}</a></p>
                        <p class="mt-n3 file-description"><span class="primary--text">Yo</span> {{ file.message_date }} {{ getTimeHour(file.message_date + " " + file.message_time) }}</p>
                      </v-col>
                    </v-row>
                  </template>
                </v-tab-item>
              </v-tabs-items>
            </v-col>
          </v-row>
        </v-col>