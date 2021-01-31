
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <h4 class="my-auto text-h6 font-weight-bold">Dislipidemia: <span v-if="patient_history.form.history_content.diseases.dyslipidemia.active">Sí</span>
                                            <span v-else>No</span></h4>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.dyslipidemia.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Fecha de diagnóstico: <br> <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.diagnostic_date }}</span></p>
                                              </v-col>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Tratamiento: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.treatment }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Estatinas</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.statins.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.statins.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">EZT</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.ezt.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.ezt.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Fibratos antagonista</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.fibratos.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.fibratos.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="4">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Omega 3</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.omega3.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dyslipidemia.omega3.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
