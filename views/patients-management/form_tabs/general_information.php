
                              <v-col cols="12" sm="6">
                                <label>Nombre</label>
                                <v-text-field class="mt-3" v-model="editedItem.first_name" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>Apellido</label>
                                <v-text-field class="mt-3" v-model="editedItem.last_name" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>Documento de identidad</label>
                                <v-select class="mt-3" v-model="editedItem.document_type" :items="document_types" item-text="text" item-value="value" outlined></v-select>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>N° de identificación</label>
                                <v-text-field class="mt-3" v-model="editedItem.id_number" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>Fecha de nacimiento</label>
                                <v-dialog ref="birthdate_dialog" v-model="birthdate_modal" :return-value.sync="editedItem.birthdate" width="290px">
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="editedItem.birthdate" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                                  </template>
                                  <v-date-picker v-model="editedItem.birthdate" locale="es" scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="birthdate_modal = false">
                                      Cancel
                                    </v-btn>
                                    <v-btn text color="primary" @click="$refs.birthdate_dialog.save(editedItem.birthdate)">
                                      OK
                                    </v-btn>
                                  </v-date-picker>
                                </v-dialog>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>Género</label>
                                <v-select class="mt-3" v-model="editedItem.gender" :items="genders" item-text="name" item-value="gender" outlined></v-select>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>Dirección</label>
                                <v-text-field class="mt-3" v-model="editedItem.address" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6">
                                <label>Correo electrónico</label>
                                <v-text-field class="mt-3" v-model="editedItem.email" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <label>Teléfono</label>
                                <v-text-field class="mt-3" v-model="editedItem.telephone" outlined></v-text-field>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <label>Plataformas de comunicación</label>
                                <v-select class="mt-3" v-model="editedItem.platforms" :items="communication_platforms" item-text="text" item-value="val" outlined></v-select>
                              </v-col>
                              <v-col cols="12" sm="6" md="4">
                                <label>Fecha de ingreso</label>
                                <v-dialog ref="entry_date_dialog" v-model="entry_date_modal" :return-value.sync="editedItem.entry_date" width="290px">
                                  <template v-slot:activator="{ on, attrs }">
                                    <v-text-field class="mt-3" v-model="editedItem.entry_date" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                                  </template>
                                  <v-date-picker v-model="editedItem.entry_date" locale="es" scrollable>
                                    <v-spacer></v-spacer>
                                    <v-btn text color="primary" @click="entry_date_modal = false">
                                      Cancel
                                    </v-btn>
                                    <v-btn text color="primary" @click="$refs.entry_date_dialog.save(editedItem.entry_date)">
                                      OK
                                    </v-btn>
                                  </v-date-picker>
                                </v-dialog>
                              </v-col>