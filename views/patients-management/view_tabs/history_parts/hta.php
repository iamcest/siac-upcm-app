
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <h4 class="my-auto text-h5 font-weight-bold">HTA: <span v-if="patient_history.form.history_content.diseases.hta.active">Sí</span>
                                            <span v-else>No</span></h4>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.hta.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Fecha de diagnóstico: <br> <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.diagnostic_date }}</span></p>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <p class="black--text font-weight-bold">Tratamiento: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.treatment }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">IECAS</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.iecas.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.iecas.frecuency }}</span></p>
                                                </v-col>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center mb-3">BRA</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.bra.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.bra.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Ca</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.ca.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.ca.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Diurético</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.diuretic.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.diuretic.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Beta bloq</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.block_beta.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.block_beta.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Bloq</h3>
                                                <v-col cols="12">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.block.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.hta.block.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
