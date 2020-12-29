
                                  <v-col class="full-width px-0" cols="12">
                                      <v-row v-for="(item, index) in 4">
                                        <v-col cols="12" md="12">
                                          <h2>Toma {{ item }}</h2>
                                        </v-col>
                                        <v-col cols="12">
                                          <v-row>
                                            <v-col class=" font-weight-bold text-center" cols="12" md="2">Frecuencia cardiaca(lat x min)</v-col>
                                            <v-col class=" font-weight-bold text-center" cols="12" md="3">Presión arterial del brazo derecho *</v-col>
                                            <v-col class=" font-weight-bold text-center" cols="12" md="3">Presión arterial del brazo izquierdo *</v-col>
                                            <v-col class=" font-weight-bold text-center" cols="12" md="2">Frecuencia respiratoria</v-col>
                                            <v-col class=" font-weight-bold text-center" cols="12" md="2">Temperatura (°C)</v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center">
                                            <v-col class="font-weight-bold text-center mt-n6" cols="12" md="2">Sentado</v-col>
                                            <v-col class="font-weight-bold text-center" takescols="12" md="3">
                                              <v-row>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['sitting']['pa_right_arm1']" outlined dense></v-text-field></v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['sitting']['pa_right_arm2']" suffix="mmHg" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['sitting']['pa_left_arm1']" outlined dense></v-text-field></v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['sitting']['pa_left_arm2']" suffix="mmHg" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="2">
                                              <v-row>
                                                <v-col cols="12"><v-text-field v-model="patient_vital_signs.takes[index]['sitting']['breathing_rate']" type="number" suffix="rpm" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="2">
                                              <v-row>
                                                <v-col cols="12"><v-text-field v-model="patient_vital_signs.takes[index]['sitting']['temperature']" type="number" suffix="°C" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center mt-n-10">
                                            <v-col class="font-weight-bold text-center mt-n6" cols="12" md="2">Acostado</v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['lying_down']['pa_right_arm1']" outlined dense></v-text-field></v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['lying_down']['pa_right_arm2']" suffix="mmHg" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['lying_down']['pa_left_arm1']" outlined dense></v-text-field></v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['lying_down']['pa_left_arm2']" suffix="mmHg" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="2">
                                              <v-row>
                                                <v-col cols="12"><v-text-field v-model="patient_vital_signs.takes[index]['lying_down']['breathing_rate']" type="number" suffix="rpm" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="2">
                                              <v-row>
                                                <v-col cols="12"><v-text-field v-model="patient_vital_signs.takes[index]['lying_down']['temperature']" type="number" suffix="°C" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                          </v-row>
                                          <v-row class="d-flex align-center pt-0 mt-0">
                                            <v-col class="font-weight-bold text-center mt-n6" cols="12" md="2">De pie</v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['standing']['pa_right_arm1']" outlined dense></v-text-field></v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['standing']['pa_right_arm2']" suffix="mmHg" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="3">
                                              <v-row>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['standing']['pa_left_arm1']" outlined dense></v-text-field></v-col>
                                                <v-col cols="2">/</v-col>
                                                <v-col cols="5"><v-text-field v-model="patient_vital_signs.takes[index]['standing']['pa_left_arm2']" suffix="mmHg" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="2">
                                              <v-row>
                                                <v-col cols="12"><v-text-field v-model="patient_vital_signs.takes[index]['standing']['breathing_rate']" type="number" suffix="rpm" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col class="font-weight-bold text-center" cols="12" md="2">
                                              <v-row>
                                                <v-col cols="12"><v-text-field v-model="patient_vital_signs.takes[index]['standing']['temperature']" type="number" suffix="°C" outlined dense></v-text-field></v-col>
                                              </v-row>
                                            </v-col>
                                            <v-col cols="12">* Luego de 5 minutos sentado el paciente</v-col>
                                          </v-row>
                                        </v-col>
                                      </v-row>
                                      <v-row>
                                        
                                        <v-col cols="12">
                                          <v-btn color="secondary white--text" block @click="calcVitalSigns">
                                            Guardar
                                          </v-btn>
                                        </v-col>
                                        
                                      </v-row>
                                  </v-col> 
