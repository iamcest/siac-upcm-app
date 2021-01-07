                         
                                  <v-col cols="12">
                                    <v-data-table :headers="views.patient_appointments.headers" :items="patient_appointments.appointments" sort-by="date" class="elevation-1 full-width">
                                      <template v-slot:no-data>
                                        <v-btn color="primary" @click="initializeAppointments" >
                                          Recargar
                                        </v-btn>
                                      </template>
                                    </v-data-table>
                                  </v-col> 
