
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <h4 class="my-auto text-h5 font-weight-bold">DTM2: <span v-if="patient_history.form.history_content.diseases.dtm2.active">Sí</span>
                                            <span v-else>No</span>
                                            </h4>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.dtm2.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Fecha de diagnóstico: <br> <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.diagnostic_date }}</span></p>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <p class="black--text font-weight-bold">Tratamiento: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.treatment }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Metmorfina</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.metformin.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.metformin.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Insulina</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.insulin.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.insulin.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Sulfonilureas</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.sulfonylureas.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.sulfonylureas.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">Inh DPP</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.inh_dpp.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.inh_dpp.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center mb-3">I SLGT2</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.i_slgt2.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.i_slgt2.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="1">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="font-weight-bold black--text text-center">GL</h3>
                                                <v-col cols="12 ">
                                                  <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.gl.dosis }}</span></p>
                                                </v-col>
                                                <v-col cols="12 ">
                                                    <p class="black--text font-weight-bold">Frecuencia: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.dtm2.gl.frecuency }}</span></p>
                                                </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
