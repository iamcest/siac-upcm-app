
        <v-col cols="12" md="3" class="pt-6 pl-0 pr-0" v-if="is_opened">
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
              <v-col class="d-flex justify-center mb-n8" cols="12">
                <v-btn color="#F44336" @click="dialog_leave_group = true" text>Salir del grupo</v-btn>                 
                <v-dialog v-model="dialog_leave_group" max-width="60%">
                  <v-card>
                    <v-card-title class="headline">Estás seguro de que quieres salir del grupo?</v-card-title>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn color="blue darken-1" text @click="dialog_leave_group = false">Cancelar</v-btn>
                      <v-btn color="blue darken-1" text @click="leaveGroup">Continuar</v-btn>
                      <v-spacer></v-spacer>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
              </v-col>
              <v-col cols="12" class="d-flex justify-center">
                <v-icon class="avatar-profile">mdi-account-group</v-icon>
              </v-col>
              <v-col cols="12" class="text-center mt-n4">
                <p class="font-weight-bold" v-if="!edit_group_name">{{ opened_chat.group_name }}</p>
                <v-text-field class="pr-2" v-model="opened_chat.group_name_copy" hint="Ingrese el nombre del grupo" persistent-hint dense outlined v-else>
                  <template #append-outer>
                    <v-icon color="#F44336" @click="edit_group_name = false">mdi-close</v-icon>
                    <v-icon color="#00BFA5" @click="saveGroupTitle">mdi-check</v-icon>
                  </template>
                </v-text-field>
                <template v-if="user_group_admin">
                  <v-col class="d-flex justify-center mt-n2" cols="12">
                    <v-icon color="#00BFA5" @click="edit_group_name = true">mdi-pencil</v-icon>
                    <v-icon color="#F44336" @click="dialog_delete_group = true">mdi-trash-can</v-icon>
                    <v-dialog v-model="dialog_delete_group" max-width="60%">
                      <v-card>
                        <v-card-title class="headline">¿Estás seguro de que quieres eliminar este grupo?</v-card-title>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="blue darken-1" text @click="dialog_delete_group = false">Cancelar</v-btn>
                          <v-btn color="blue darken-1" text @click="deleteGroup">Continuar</v-btn>
                          <v-spacer></v-spacer>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-col>
                </template>
                <h4 class="text-center grey--text">Miembros</h4>
              </v-col>        
              <v-dialog v-model="dialog_kick" max-width="60%">
                <v-card>
                  <v-card-title class="headline">Estás seguro de que quieres expulsar este miembro del grupo?</v-card-title>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="closeDialogs">Cancelar</v-btn>
                    <v-btn color="blue darken-1" text @click="deleteMember">Continuar</v-btn>
                    <v-spacer></v-spacer>
                  </v-card-actions>
                </v-card>
              </v-dialog>
              <v-dialog v-model="dialog_member_type" max-width="60%" v-if="dialog_member_type">
                <v-card>
                  <v-card-title class="headline" v-if="selected_member.member_type != 'administrador'">¿Estás seguro de que quieres establecer darle permisos de administrador a este miembro del grupo?</v-card-title>
                  <v-card-title class="headline" v-else>¿Estás seguro de revocarle los permisos de administrador a este miembro del grupo?</v-card-title>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="closeDialogs">Cancelar</v-btn>
                    <v-btn color="blue darken-1" text @click="changeMemberType">Continuar</v-btn>
                    <v-spacer></v-spacer>
                  </v-card-actions>
                </v-card>
              </v-dialog>
              <v-row class="mx-3 member_list_container">
                <v-col class="mx-0 my-0 px-0 py-0 mb-n2" cols="6" md="12" lg="6" v-for="i in group_members">
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title class="subtitle-1 grey--text">
                        <v-icon x-large v-if="i.avatar == '' || i.avatar == null">mdi-account-circle</v-icon>
                        <v-avatar size="40" v-else><v-img :src="'<?php ECHO SITE_URL ?>/public/img/avatars/' + i.avatar"></v-img></v-avatar> {{ i.first_name }} {{ i.last_name }} <br>{{ i.member_type }}
                        <template v-if="user_group_admin && i.user_id != uid">
                          <v-icon class="primary--text" v-if="i.member_type == 'miembro'" @click="openMemberTypeDialog(i)">mdi-arrow-up</v-icon>
                          <v-icon class="secondary--text" @click="openMemberTypeDialog(i)" v-else>mdi-arrow-down</v-icon>
                          <v-icon color="#F44336" @click="openKickDialog(i)">mdi-close</v-icon>
                        </template>
                      </v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>            
                </v-col>
              </v-row>
            </template>
            <v-col class="files_container mt-4" class="mt-4" v-bind:class="{ files_container: private_chat, group_files_container: !private_chat }" cols="12">

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