|
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.active" :items="patient_history.select" item-text='text' item-value='value' outlined dense>
                                              <template v-slot:prepend>
                                                <h4 class="my-auto text-h5 font-weight-bold">Dislipidemia:</h4>
                                              </template>
                                            </v-select>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.dyslipidemia.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Fecha de diagnóstico:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.diagnostic_date" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Tratamiento:</label>
                                                <v-select v-model="patient_history.form.history_content.diseases.dyslipidemia.treatment" class="mt-3" outlined dense></v-select>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Estatinas</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.statins.frecuency" class="black-text" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">EZT</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.ezt.frecuency" class="black-text" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Fibratos antagonista</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.fibratos.frecuency" class="black-text" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Omega 3</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dyslipidemia.omega3.frecuency" class="black-text" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
