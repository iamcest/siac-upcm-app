
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <v-select v-model="patient_history.form.history_content.diseases.hta.active" :items="patient_history.select" item-text='text' item-value='value' outlined dense>
                                              <template v-slot:prepend>
                                                <h4 class="my-auto text-h6 font-weight-bold">HTA:</h4>
                                              </template>
                                            </v-select>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.hta.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Fecha de diagnóstico:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.diagnostic_date" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Tratamiento:</label>
                                                <v-select v-model="patient_history.form.history_content.diseases.hta.treatment" class="mt-3" outlined dense></v-select>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">IECAS</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.iecas.dosis" class="mt-3" outlined dense>
                                                  <template v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.iecas.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center mb-3">BRA</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.bra.dosis" class="black-text mt-3" outlined dense>
                                                  <template v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.bra.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Ca</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.ca.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.ca.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Diurético</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.diuretic.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.diuretic.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Beta bloq</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.block_beta.dosis" class="mt-3" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.block_beta.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center mb-3">Bloq</h3>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.block.dosis" class="black-text" class="mt-3" outlined dense>
                                                  <template v-slot:prepend>
                                                    <span class="font-weight-bold">Dosis:</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Frecuencia:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.hta.block.frecuency" class="black-text mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
