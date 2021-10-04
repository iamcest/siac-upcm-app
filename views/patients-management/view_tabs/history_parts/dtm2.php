
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start align-center">
                                          <v-col class="mt-6" cols="4" md="3" lg="2">
                                            <h4 class="my-auto text-h6 font-weight-bold">DMt2: <span v-if="patient_history.form.history_content.diseases.dtm2.active">Sí</span>
                                                <span v-else>No</span></h4>
                                          </v-col>
                                          <template v-if="patient_history.form.history_content.diseases.dtm2.active">
                                            <v-col cols="4" md="3" lg="2">
                                              <label class="black--text font-weight-bold">Controlado:
                                                <template v-if="patient_history.form.history_content.diseases.dtm2.controlled">
                                                  Sí
                                                </template>
                                                <template v-else>
                                                  No
                                                </template>
                                              </label>
                                            </v-col>
                                            <v-col cols="4" md="3" lg="2">
                                              <label class="black--text font-weight-bold">Diagnóstico previo:
                                                <template v-if="patient_history.form.history_content.diseases.dtm2.detected_previously">
                                                  Sí
                                                </template>
                                                <template v-else>
                                                  No
                                                </template>
                                              </label>
                                            </v-col>
                                              <label class="black--text font-weight-bold">Fecha de diagnóstico: {{ patient_history.form.history_content.diseases.dtm2.diagnostic_date }}
                                            </v-col>
                                          </template>
                                        </v-row>
                                      </v-col>
