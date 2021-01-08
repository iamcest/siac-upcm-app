      <!-- START AFTER THIS-->
      <v-main>
        <!-- Provides the application the proper gutter -->
        <v-container fluid white>
            <v-row>
                <?php echo new Template('parts/sidebar') ?>
                <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('parts/upcm_logo') ?>
                    <h2>Inicio</h2>
              <v-col class="d-flex justify-end" cols="12">
                <v-btn color="secondary" dark rounded class="mb-2" @click="create_dialog = true">
                  <v-icon>mdi-plus</v-icon>
                  Añadir cita
                </v-btn>
              </v-col>
                    <div id="calendar" class="px-4 mt-10"></div>
                </v-col>
            </v-row>
          <v-dialog v-model="dialog" max-width="90%" >
            <v-card>
              <v-toolbar elevation="0">
                <v-toolbar-title class="font-weight-bold">Detalles de la cita</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                <v-btn icon dark @click="dialog = false">
                  <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
                </v-toolbar-items>
              </v-toolbar>
              
              <v-divider></v-divider>

              <v-card-text v-if="dialog">
                <v-container fluid>
                  <v-row>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>N° de historia:</strong>
                        <span class="font-weight-light">{{ appointment_selected.props.patient_id }}</span>
                      </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>Paciente:</strong>
                        <span class="font-weight-light">{{ appointment_selected.patient }}</span>
                      </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>Especialista:</strong>
                        <span class="font-weight-light">{{ appointment_selected.props.doctor }}</span>
                      </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>Motivo de la cita:</strong>
                        <span class="font-weight-light">{{ appointment_selected.props.appointment_reason }}</span>
                      </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>Tipo de cita:</strong>
                        <span class="font-weight-light">{{ appointment_selected.props.appointment_type }}</span>
                      </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>Fecha:</strong>
                        <span class="font-weight-light">{{ fromNow(appointment_selected.props.appointment_date) }}</span>
                      </p>
                    </v-col>
                    <v-col cols="12" sm="6">
                      <p class="black--text text-h6"><strong>Hora:</strong>
                        <span class="font-weight-light">{{ appointment_selected.props.appointment_time }}</span>
                      </p>
                    </v-col>
                  </v-row>
                  <v-divider></v-divider>
                  <v-row>
                    <v-col cols="12">
                      <h4 class="text-h5 grey--text text-center">Citas anteriores</h4>
                    </v-col>
                    <v-col cols="12">
                      <v-data-table :headers="headers" :items="patient_appointments" sort-by="appointment_date" :sort-desc="true" class="elevation-1 full-width">
                        <template v-slot:no-data>
                          No se encontraron registros de citas anteriores
                        </template>
                      </v-data-table>
                    </v-col> 
                  </v-row>
                </v-container>
              </v-card-text>

            </v-card>
          </v-dialog> 
          <v-dialog v-model="create_dialog" max-width="90%" >
            <v-card>
              <v-toolbar elevation="0">
                <v-toolbar-title class="font-weight-bold">Añadir cita</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                <v-btn icon dark @click="dialog = false">
                  <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
                </v-toolbar-items>
              </v-toolbar>
              
              <v-divider></v-divider>

              <v-card-text>
                <v-container fluid>
                  <v-form>
                    <v-row>
                      <v-col cols="12" sm="6">
                        <label>Seleccione el paciente</label>
                        <v-select class="mt-3" v-model="form.patient_id" :search-input.sync="search" :items="patients" item-text="full_name" item-value="patient_id" outlined>
                          <template v-slot:prepend-item>
                            <v-list-item>
                              <v-list-item-content>
                                <v-text-field v-model="search" placeholder="Buscar paciente" @input="searchPatients" outlined></v-text-field>
                              </v-list-item-content>
                            </v-list-item>
                            <v-btn class="mt-n6" color="primary" text @click="patient_dialog = true">
                              <v-icon>mdi-plus-circle</v-icon>
                              Añadir paciente
                            </v-btn>
                            <v-divider class="mt-2"></v-divider>
                          </template>
                        </v-select>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Seleccione el especialista</label>
                        <v-select class="mt-3" v-model="form.user_id" :search-input.sync="search" :items="doctors" item-text="full_name" item-value="user_id" outlined></v-select>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Motivo de la cita</label>
                        <v-text-field class="mt-3" v-model="form.appointment_reason" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Tipo de cita</label>
                        <v-select class="mt-3" v-model="form.appointment_type" :items="appointment_types" outlined></v-select>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Fecha de la cita</label>

                        <v-dialog ref="appointment_date_dialog" v-model="appointment_date_modal" :return-value.sync="form.appointment_date" width="290px">
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field class="mt-3" v-model="form.appointment_date" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                          </template>
                          <v-date-picker v-model="form.appointment_date" locale="es" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="appointment_date_modal = false">
                              Cancel
                            </v-btn>
                            <v-btn text color="primary" @click="$refs.appointment_date_dialog.save(form.appointment_date)">
                              OK
                            </v-btn>
                          </v-date-picker>
                        </v-dialog>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Hora de la cita</label>
                        <v-dialog  ref="appointment_time_dialog" v-model="appointment_time_modal" :return-value.sync="form.appointment_time" persistent width="290px">
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field class="mt-3" v-model="form.appointment_time" append-icon="mdi-clock-time-four-outline" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                          </template>
                          <v-time-picker v-if="appointment_time_modal" v-model="form.appointment_time" full-width>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="appointment_time_modal = false" >
                              Cancelar
                            </v-btn>
                            <v-btn text color="primary" @click="$refs.appointment_time_dialog.save(form.appointment_time)" >
                              OK
                            </v-btn>
                          </v-time-picker>
                        </v-dialog>
                      </v-col>
                      <v-col cols="12">
                        <v-btn color="secondary white--text" block @click="saveAppointment" :loading="loading_form">
                          Guardar
                        </v-btn>
                      </v-col>
                    </v-row>
                   
                  </v-form> 
                </v-container>
              </v-card-text>

            </v-card>
          </v-dialog> 
          <v-dialog v-model="patient_dialog" max-width="90%" >
            <v-card>
              <v-toolbar elevation="0">
                <v-toolbar-title class="font-weight-bold">Añadir Paciente</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                <v-btn icon dark @click="patient_dialog = false">
                  <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
                </v-toolbar-items>
              </v-toolbar>
              
              <v-divider></v-divider>

              <v-card-text>
                <v-container fluid>
                  <v-form>
                    <v-row>
                      <v-col cols="12" sm="6">
                        <label>Nombre</label>
                        <v-text-field class="mt-3" v-model="patient.first_name" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Apellido</label>
                        <v-text-field class="mt-3" v-model="patient.last_name" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Documento de identidad</label>
                        <v-select class="mt-3" v-model="patient.document_type" :items="document_types" item-text="text" item-value="value" outlined></v-select>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>N° de identificación</label>
                        <v-text-field class="mt-3" v-model="patient.document_id" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Fecha de nacimiento</label>
                        <v-dialog ref="birthdate_dialog" v-model="birthdate_modal" :return-value.sync="patient.birthdate" width="290px">
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field class="mt-3" v-model="patient.birthdate" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                          </template>
                          <v-date-picker v-model="patient.birthdate" locale="es" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="birthdate_modal = false">
                              Cancel
                            </v-btn>
                            <v-btn text color="primary" @click="$refs.birthdate_dialog.save(patient.birthdate)">
                              OK
                            </v-btn>
                          </v-date-picker>
                        </v-dialog>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Género</label>
                        <v-select class="mt-3" v-model="patient.gender" :items="genders" item-text="name" item-value="gender" outlined></v-select>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Dirección</label>
                        <v-text-field class="mt-3" v-model="patient.address" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <label>Correo electrónico</label>
                        <v-text-field class="mt-3" v-model="patient.email" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <label>Teléfono</label>
                        <v-text-field class="mt-3" v-model="patient.telephone" outlined></v-text-field>
                      </v-col>
                      <v-col cols="12" md="4">
                        <label>Plataformas de comunicación</label>
                        <v-row class="pt-0">
                          <v-col cols="4" class="whatsapp-platform">
                            <v-checkbox v-model="patient.whatsapp" :true-value="parseInt(1)" :false-value="parseInt(0)" prepend-icon="mdi-whatsapp" ></v-checkbox>
                          </v-col>
                          <v-col cols="4" class="telegram-platform">
                            <v-checkbox v-model="patient.telegram" :true-value="parseInt(1)" :false-value="parseInt(0)" prepend-icon="mdi-telegram" ></v-checkbox>
                          </v-col>
                          <v-col cols="4" class="sms-platform">
                            <v-checkbox v-model="patient.sms" :true-value="parseInt(1)" :false-value="parseInt(0)" prepend-icon="mdi-comment-text" ></v-checkbox>

                          </v-col>
                        </v-row>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <label>Fecha de ingreso</label>
                        <v-dialog ref="entry_date_dialog" v-model="entry_date_modal" :return-value.sync="patient.entry_date" width="290px">
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field class="mt-3" v-model="patient.entry_date" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                          </template>
                          <v-date-picker v-model="patient.entry_date" locale="es" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="entry_date_modal = false">
                              Cancel
                            </v-btn>
                            <v-btn text color="primary" @click="$refs.entry_date_dialog.save(patient.entry_date)">
                              OK
                            </v-btn>
                          </v-date-picker>
                        </v-dialog>
                      </v-col>
                      <v-col cols="12">
                        <v-btn class="secondary white--text" @click="savePatient" :loading="patient_create_loading" block>Guardar</v-btn>
                      </v-col>
                    </v-row>
                   
                  </v-form> 
                </v-container>
              </v-card-text>

            </v-card>
          </v-dialog>   
        </v-container>
      </v-main>