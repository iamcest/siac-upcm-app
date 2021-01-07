
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <v-select v-model="patient_history.form.history_content.diseases.dtm2.active" :items="patient_history.select" item-text='text' item-value='value' outlined dense>
                                              <template v-slot:prepend>
                                                <h4 class="my-auto text-h5 font-weight-bold">DTM2:</h4>
                                              </template>
                                            </v-select>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.dtm2.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Fecha de diagnóstico:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.diagnostic_date" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Tratamiento:</label>
                                                <v-select v-model="patient_history.form.history_content.diseases.dtm2.treatment" class="mt-3" outlined dense></v-select>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Metmorfina</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.metformin.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold mb-3">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.metformin.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Insulina</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.insulin.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.insulin.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Sulfonilureas</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.sulfonylureas.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.sulfonylureas.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Inh DPP</h3>
                                                <v-text-field class="mt-3" outlined dense>
                                                  <template v-model="patient_history.form.history_content.diseases.dtm2.inh_dpp.dosis" class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.inh_dpp.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center mb-3">I SLGT2</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.i_slgt2.dosis" class="black-text" class="mt-3" outlined dense>
                                                  <template v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.i_slgt2.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">GL</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.gl.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.dtm2.gl.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
