
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <h4 class="my-auto text-h5 font-weight-bold">Tabaquismo: <span v-if="patient_history.form.history_content.diseases.smoking.active">Sí</span>
                                            <span v-else>No</span></h4>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.smoking.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Año de inicio aproximado: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.start_year }}</span></p>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <p class="black--text font-weight-bold">Año de abandono: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.quit_year }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Número de cigarros al día: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.cigarettes_per_day }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Test de Fageroom: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.fageroom_test }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">¿Ha dejado de fumar alguna vez? <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.no_smoking_frecuency }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">¿Desea dejar de fumar? <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.smoking_wish }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="factor-risk-column" cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold"></label>
                                                <p class="black--text font-weight-bold">Breve consejería: <span class="font-weight-light">{{ patient_history.form.history_content.diseases.smoking.short_advice }}</span></p>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
