
	<!-- START AFTER THIS-->
	<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
    	<v-row>
	    	<?php echo new Template('admin/parts/sidebar') ?>
    		<v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
    			<h2>Miembros</h2>
            <v-row class="mt-6">
                <v-col cols="12">
                  <v-data-table :headers="headers" :items="members" sort-by="full_name" class="elevation-1" >
                    <template v-slot:top>
                      <v-toolbar flat>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="1200px" >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                                  <v-icon>mdi-plus</v-icon>
                                  Añadir miembro
                                </v-btn>
                            </template>
                          <v-card>
                            <v-toolbar elevation="0">
                              <v-toolbar-title>{{ formTitle }}</v-toolbar-title>
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
                                  <v-col cols="12">
                                    <label>Tipo de miembro</label>
                                    <v-select class="mt-3" v-model="editedItem.user_type" :items="user_types" outlined></v-select>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="6" v-if="editedItem.user_type == 'coordinador' || editedItem.user_type == 'miembro'">
                                    <label>UPCM</label>
                                    <v-select class="mt-3" v-model="editedItem.upcm_id" :items="upcms" item-text="upcm_name" item-value="upcm_id" outlined></v-select>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="6" v-if="editedItem.user_type == 'coordinador' || editedItem.user_type == 'miembro'">
                                    <label>Rol</label>
                                    <v-select class="mt-3" v-model="editedItem.rol" :items="rols" item-text="text" item-value="val" outlined></v-select>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="4">
                                    <label>Nombre</label>
                                    <v-text-field name="first_name" class="mt-3" v-model="editedItem.first_name" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="4">
                                    <label>Apellido</label>
                                    <v-text-field name="last_name" class="mt-3" v-model="editedItem.last_name" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="4">
                                    <label>Correo electrónico</label>
                                    <v-text-field name="email" class="mt-3" v-model="editedItem.email" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="6">
                                    <label>Teléfono</label>
                                    <v-text-field name="telephone" class="mt-3" v-model="editedItem.telephone" outlined solo></v-text-field>
                                  </v-col>              
                                  <v-col cols="12" md="6">
                                    <label>Plataformas de comunicación</label>
                                    <v-row class="pt-0">
                                      <v-col cols="4" class="whatsapp-platform">
                                        <v-checkbox v-model="editedItem.whatsapp" :checked="editedItem.whatsapp == 1" true-value="1" false-value="0" prepend-icon="mdi-whatsapp" ></v-checkbox>
                                      </v-col>
                                      <v-col cols="4" class="telegram-platform">
                                        <v-checkbox v-model="editedItem.telegram" :checked="editedItem.telegram == 1" true-value="1" false-value="0"  prepend-icon="mdi-telegram" ></v-checkbox>
                                      </v-col>
                                      <v-col cols="4" class="sms-platform">
                                        <v-checkbox v-model="editedItem.sms" :checked="editedItem.sms == 1" true-value="1" false-value="0" prepend-icon="mdi-comment-text" ></v-checkbox>

                                      </v-col>
                                    </v-row>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="6">
                                    <label>Género</label>
                                    <v-select class="mt-3" v-model="editedItem.gender" :items="genders" item-text="name" item-value="gender" outlined solo></v-select>
                                  </v-col>
                                  <v-col cols="12" sm="6">
                                    <label>Fecha de nacimiento</label>
                                    <v-dialog ref="birthdateDialog" v-model="modal" :return-value.sync="editedItem.birthdate" width="290px">
                                      <template v-slot:activator="{ on, attrs }">
                                        <v-text-field name="birthdate" class="mt-3" v-model="editedItem.birthdate" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                                      </template>
                                      <v-date-picker v-model="editedItem.birthdate" locale="es" scrollable>
                                        <v-spacer></v-spacer>
                                        <v-btn text color="primary" @click="modal = false">
                                          Cancel
                                        </v-btn>
                                        <v-btn text color="primary" @click="$refs.birthdateDialog.save(editedItem.birthdate)">
                                          OK
                                        </v-btn>
                                      </v-date-picker>
                                    </v-dialog>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="6">
                                    <label>Contraseña</label>
                                    <v-text-field type="password" class="mt-3" v-model="editedItem.password" outlined solo></v-text-field>
                                  </v-col>
                                  <v-col cols="12" sm="12" md="6">
                                    <label>Confirmar contraseña</label>
                                    <v-text-field type="password" class="mt-3" v-model="editedItem.password_confirm" outlined solo></v-text-field>
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
                            <v-card-title class="headline">¿Estás seguro de que quieres eliminar este miembro?</v-card-title>
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
                      <v-icon md @click="editItem(item)" color="#76d7d7">
                        mdi-eye
                      </v-icon>
                      <v-icon md @click="editItem(item)" color="#00BFA5">
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
                        Recargar
                      </v-btn>
                    </template>
                  </v-data-table>
                </v-col>
            </v-row>
    		</v-col>
    	</v-row>
    </v-container>
  </v-main>