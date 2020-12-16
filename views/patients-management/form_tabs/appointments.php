                         
                                  <v-col cols="12">
                                    <v-data-table :headers="patient_appointments.headers" :items="patient_appointments.appointments" sort-by="date" class="elevation-1 full-width">
                                      <template v-slot:top>
                                        <v-toolbar flat>     
                                          <v-spacer></v-spacer>           
                                          <v-dialog v-model="patient_appointments.dialog" max-width="90%" >
                                            <template v-slot:activator="{ on, attrs }">
                                              <v-btn color="secondary" dark rounded class="mb-2" v-bind="attrs" v-on="on">
                                                <v-icon>mdi-plus</v-icon>
                                                Añadir cita
                                              </v-btn>
                                            </template>
                                            <v-card>
                                              <v-toolbar elevation="0">
                                                <v-toolbar-title>{{ AppointmentFormTitle }}</v-toolbar-title>
                                                <v-spacer></v-spacer>
                                                <v-toolbar-items>
                                                <v-btn icon dark @click="patient_appointments.dialog = false">
                                                  <v-icon color="grey">mdi-close</v-icon>
                                                </v-btn>
                                                </v-toolbar-items>
                                              </v-toolbar>
                                              
                                              <v-divider></v-divider>
                                              <v-form class="dialog_form">
                                                <v-row class="px-8">
                                                  <v-col cols="12" sm="6">
                                                    <label>Seleccione el especialista</label>
                                                    <v-select class="mt-3" v-model="patient_appointments.editedItem.doctor_id" :items="patient_appointments.doctors" item-text="full_name" item-value="id" no-data-text='No hay datos disponibles' outlined></v-select>
                                                  </v-col>
                                                  <v-col cols="12" sm="6">
                                                    <label>Motivo de la cita</label>
                                                    <v-text-field class="mt-3" v-model="patient_appointments.editedItem.reason" outlined>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="12" sm="6">
                                                    <label>Tipo de cita</label>
                                                    <v-select class="mt-3" v-model="patient_appointments.editedItem.type_id" :items="patient_appointments.types" item-text="text" item-value="id" :no-data-text='empty_message' outlined></v-select>
                                                  </v-col>
                                                  <v-col cols="12" sm="6">
                                                    <label>Fecha de la cita</label>

                                                    <v-dialog ref="appointment_date_dialog" v-model="patient_appointments.date_modal" :return-value.sync="patient_appointments.editedItem.date" width="290px">
                                                      <template v-slot:activator="{ on, attrs }">
                                                        <v-text-field class="mt-3" v-model="patient_appointments.editedItem.date" append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                                                      </template>
                                                      <v-date-picker v-model="patient_appointments.editedItem.date" locale="es" scrollable>
                                                        <v-spacer></v-spacer>
                                                        <v-btn text color="primary" @click="patient_appointments.date_modal = false">
                                                          Cancel
                                                        </v-btn>
                                                        <v-btn text color="primary" @click="$refs.appointment_date_dialog.save(patient_appointments.editedItem.date)">
                                                          OK
                                                        </v-btn>
                                                      </v-date-picker>
                                                    </v-dialog>
                                                  </v-col>
                                                  <v-col cols="12" sm="6">
                                                    <label>Hora de la cita</label>
                                                    <v-dialog  ref="appointment_time_dialog" v-model="patient_appointments.time_modal" :return-value.sync="patient_appointments.editedItem.time" persistent width="290px">
                                                      <template v-slot:activator="{ on, attrs }">
                                                        <v-text-field class="mt-3" v-model="patient_appointments.editedItem.time" append-icon="mdi-clock-time-four-outline" readonly v-bind="attrs" v-on="on" outlined></v-text-field>
                                                      </template>
                                                      <v-time-picker v-if="patient_appointments.time_modal" v-model="patient_appointments.editedItem.time" full-width>
                                                        <v-spacer></v-spacer>
                                                        <v-btn text color="primary" @click="patient_appointments.time_modal = false" >
                                                          Cancelar
                                                        </v-btn>
                                                        <v-btn text color="primary" @click="$refs.appointment_time_dialog.save(patient_appointments.editedItem.time)" >
                                                          OK
                                                        </v-btn>
                                                      </v-time-picker>
                                                    </v-dialog>
                                                  </v-col>
                                                  
                                                </v-row>
                                              </v-form>
                                              <v-card-actions class="px-8">
                                                <v-spacer></v-spacer>
                                                <v-btn color="secondary white--text" block @click="saveAppointment">
                                                  Guardar
                                                </v-btn>
                                              </v-card-actions>
                                            </v-card>
                                          </v-dialog>
                                          <v-dialog v-model="patient_appointments.dialogDelete" max-width="1200px">
                                            <v-card>
                                              <v-card-title class="headline">Estás seguro de que quieres eliminar esta cita?</v-card-title>
                                              <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="blue darken-1" text @click="closeAppointmentDelete">Cancelar</v-btn>
                                                <v-btn color="blue darken-1" text @click="deleteAppointmentItemConfirm">Continuar</v-btn>
                                                <v-spacer></v-spacer>
                                              </v-card-actions>
                                            </v-card>
                                          </v-dialog>
                                        </v-toolbar>
                                      </template>
                                      <template v-slot:item.doctor_full_name="{ item }">
                                        {{ getDoctorFullName(item.doctor_id) }}
                                      </template>
                                      <template v-slot:item.type="{ item }">
                                        {{ getAppointmentType(item.type_id) }}
                                      </template>
                                      <template v-slot:item.actions="{ item }">
                                        <v-row justify="center" align="center">
                                          <v-icon md class="" @click="editAppointmentItem(item)" color="#00BFA5">
                                            mdi-pencil
                                          </v-icon>
                                          <v-icon md @click="deleteAppointmentItem(item)" color="#F44336">
                                            mdi-delete
                                          </v-icon>
                                        </v-row>

                                      </template>
                                      <template v-slot:no-data>
                                        <v-btn color="primary" @click="initialize" >
                                          Reset
                                        </v-btn>
                                      </template>
                                    </v-data-table>
                                  </v-col> 
