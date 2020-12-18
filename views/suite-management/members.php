    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="grey--text text--darken-1">Miembros de la UPCM</h2>
            </v-col>
            
          </v-row>
          <v-row class="mt-6">
            <v-col cols="12">
              <v-data-table :headers="headers" :items="members" sort-by="full_name" class="elevation-1" >
                <template v-slot:top>
                  <v-toolbar flat>
                    <v-dialog v-model="dialog" max-width="1200px" >
                      <v-card>
                        <v-toolbar elevation="0">
                          <v-toolbar-title>Editar Miembro</v-toolbar-title>
                          <v-spacer></v-spacer>
                          <v-toolbar-items>
                          <v-btn icon dark @click="dialog = false">
                            <v-icon color="grey">mdi-close</v-icon>
                          </v-btn>
                          </v-toolbar-items>
                        </v-toolbar>
                        
                        <v-divider></v-divider>

                        <v-card-text>
                          <v-container>
                            <v-row>
                              <v-col cols="12" md="12">
                                <h2 class="text-center">Mi Perfil</h2>
                              </v-col>
                              
                              <v-col cols="12" md="12">
                                <div class="d-flex justify-center">
                                  <v-form>
                                    <v-avatar class="uploading-image d-block" v-if="editedItem.avatar != null && !upload_button" size="7vw">
                                      <img :src="'<?php echo SITE_URL ?>/public/img/avatars/' + editedItem.avatar">
                                    </v-avatar>
                                    <v-col class="d-flex justify-center" v-if="editedItem.avatar == null" cols="12">
                                      <v-icon class="avatar-image">mdi-account-circle</v-icon>
                                    </v-col>
                                    <v-avatar class="uploading-image d-block" v-if="upload_button" size="7vw">
                                      <img :src="previewImage">
                                      <img :src="editedItem.avatar" >
                                    </v-avatar>
                                    <v-row class="d-flex justify-center">
                                      <label for="avatar">
                                        <v-icon class="text-center cursor-pointer" large color="#00BFA5">mdi-pencil-box-outline</v-icon>
                                        <input type="file" name="avatar" id="avatar" class="d-none" v-on:change="prevImage"/>  
                                      </label>
                                    </v-row>
                                    <v-row class="d-flex justify-center mt-4" v-if="upload_button">
                                      <v-btn class="primary white--text" v-on:click="uploadImage" :loading="image_loading" d-block>Subir</v-btn> 
                                    </v-row>
                                  </v-form>
                                </div>
                              </v-col>
                              <v-col cols="12">
                                <label>Rol</label>
                                <v-select class="mt-3" v-model="editedItem.rol" :items="rols" outlined ></v-select>
                              </v-col>
                              <v-col cols="12" sm="6" md="4" >
                                <label>Nombre</label>
                                <v-text-field class="mt-3" v-model="editedItem.first_name" outlined solo ></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6" md="4" >
                                <label>Apellido</label>
                                <v-text-field class="mt-3" v-model="editedItem.last_name" outlined solo ></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6" md="4" >
                                <label>Correo electrónico</label>
                                <v-text-field class="mt-3" v-model="editedItem.email" outlined solo ></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6" md="6" >
                                <label>Teléfono</label>
                                <v-text-field class="mt-3" v-model="editedItem.telephone" outlined solo></v-text-field>
                              </v-col>
                              <v-col cols="12" md="6">
                                <label>Plataformas de comunicación</label>
                                <v-row class="pt-0">
                                  <v-col cols="4" class="whatsapp-platform">
                                    <v-checkbox v-model="editedItem.whatsapp" prepend-icon="mdi-whatsapp" ></v-checkbox>
                                  </v-col>
                                  <v-col cols="4" class="telegram-platform">
                                    <v-checkbox v-model="editedItem.telegram" prepend-icon="mdi-telegram" ></v-checkbox>
                                  </v-col>
                                  <v-col cols="4" class="sms-platform">
                                    <v-checkbox v-model="editedItem.sms" prepend-icon="mdi-comment-text" ></v-checkbox>

                                  </v-col>
                                </v-row>
                              </v-col>
                              <v-col cols="12" sm="6" md="6" >
                                <label>Género</label>
                                <v-select class="mt-3" v-model="editedItem.gender" :items="genders" item-text="name" item-value="gender" outlined ></v-select>
                              </v-col>
                              <v-col cols="12" sm="6" md="6" >
                                <label>Fecha de nacimiento</label>
                                <v-menu ref="menu" v-model="menu" :close-on-content-click="false" :return-value.sync="editedItem.birthdate" transition="scale-transition" offset-y min-width="300px">
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-text-field class="mt-3" outlined v-model="editedItem.birthdate" outlined readonly v-bind="attrs" v-on="on"
                                    ></v-text-field>
                                  </template>
                                  <v-date-picker v-model="editedItem.birthdate" no-title scrollable>
                                    <v-spacer></v-spacer>
                                      <v-btn text color="primary" @click="menu = false">
                                        Cancelar
                                      </v-btn>
                                      <v-btn text color="primary" @click="$refs.menu.save(editedItem.birthdate)">
                                        OK
                                      </v-btn>
                                  </v-date-picker>
                                </v-menu>
                              </v-col>
                              <v-col cols="12" sm="6" md="6" >
                                <label>Contraseña</label>
                                <v-text-field class="mt-3" v-model="editedItem.password" outlined solo></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6" md="6" >
                                <label>Confirmar contraseña</label>
                                <v-text-field class="mt-3" v-model="editedItem.password_confirm" outlined solo></v-text-field>
                              </v-col>
                            </v-row>
                          </v-container>
                        </v-card-text>

                        <v-card-actions class="px-8">
                          <v-spacer></v-spacer>
                          <v-btn color="secondary white--text" block @click="save">
                            Guardar
                          </v-btn>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogDelete" max-width="1200px">
                      <v-card>
                        <v-card-title class="headline">Estás seguro de que quieres eliminar este miembro de la unidad?</v-card-title>
                        <v-card-actions>
                          <v-spacer></v-spacer>
                          <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                          <v-btn color="blue darken-1" text @click="deleteItemConfirm">Continuar</v-btn>
                          <v-spacer></v-spacer>
                        </v-card-actions>
                      </v-card>
                    </v-dialog>
                  </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                  <v-icon md class="mr-2" @click="editItem(item)" color="#00BFA5">
                    mdi-pencil
                  </v-icon>
                  <v-icon md @click="deleteItem(item)" color="#F44336">
                    mdi-delete
                  </v-icon>
                </template>
                <template v-slot:item.full_name="{ item }">
                  {{ item.first_name }} {{ item.last_name }}
                </template>
                <template v-slot:no-data>
                  <v-btn color="primary" @click="initialize" >
                    Reset
                  </v-btn>
                </template>

            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-main>