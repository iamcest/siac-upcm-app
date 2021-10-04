
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="4" md="3" lg="2">
                                            <h4 class="my-auto text-h6 font-weight-bold">Tabaquismo: <span v-if="patient_history.form.history_content.diseases.smoking.active">Sí</span>
                                              <span v-else>No</span></h4>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.smoking.active">
                                          <v-col cols="6" md="4" lg="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Año de inicio aproximado: {{ getOnlyYear(patient_history.form.history_content.diseases.smoking.start_year) }} </label>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Año de abandono: {{ getOnlyYear(patient_history.form.history_content.diseases.smoking.quit_year) }} </label>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="6" md="4" lg="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Número de cigarros al día: {{ patient_history.form.history_content.diseases.smoking.cigarettes_per_day }} </label>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="6" md="4" lg="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Test de Fagerström: {{ patient_history.form.history_content.diseases.smoking.fagerstrom_test }}<template v-if="patient_history.form.history_content.diseases.smoking.fagerstrom_test != ''">. {{ getFagerStromScoreDescription(false) }}</template></label>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="6" md="4" lg="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">¿Ha dejado de fumar alguna vez?
                                                  <template v-if="patient_history.form.history_content.diseases.smoking.no_smoking_frecuency">
                                                    Sí
                                                  </template>
                                                  <template v-else>
                                                    No
                                                  </template>
                                                </label>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="6" md="4" lg="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">¿Desea dejar de fumar?
                                                  <template v-if="patient_history.form.history_content.diseases.smoking.smoking_wish">
                                                    Sí
                                                  </template>
                                                  <template v-else>
                                                    No
                                                  </template>
                                                </label>
                                              </v-col>
                                              <template v-if="patient_history.form.history_content.diseases.smoking.no_smoking_frecuency">
                                                <v-col cols="12">
                                                  <label class="black--text font-weight-bold">Hace cuánto tiempo: {{ patient_history.form.history_content.diseases.smoking.last_time }}</label>
                                                </v-col>
                                                <v-col cols="12" class="mt-n4">
                                                  <label class="black--text font-weight-bold">Cuántas veces: {{ patient_history.form.history_content.diseases.smoking.how_many_times }} </label>
                                                </v-col>
                                              </template>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="6" md="4" lg="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Breve consejería:</label>
                                                <template v-if="patient_history.form.history_content.diseases.smoking.short_advice.done">
                                                  Sí
                                                </template>
                                                <template v-else>
                                                  No
                                                </template>
                                              </v-col>
                                              <v-col cols="12" 
                                              v-if="patient_history.form.history_content.diseases.smoking.short_advice.done 
                                              && patient_history.form.history_content.diseases.smoking.short_advice.material.material_name !== ''">
                                                <label class="black--text font-weight-bold">Material seleccionado: </label>
                                                {{ patient_history.form.history_content.diseases.smoking.short_advice.material.material_name }} 
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="!patient_history.form.history_content.diseases.smoking.active">
                                          <v-col cols="6" md="4" lg="2">
                                            <label class="black--text font-weight-bold">¿Fumó alguna vez?
                                              <template v-if="patient_history.form.history_content.diseases.smoking.did_smoke">
                                                Sí
                                              </template>
                                              <template v-else>
                                                No
                                              </template>
                                            </label>
                                          </v-col>
                                          <v-col cols="6" md="4" lg="2" v-if="patient_history.form.history_content.diseases.smoking.did_smoke">
                                            <label class="black--text font-weight-bold">Año de abandono: {{ getOnlyYear(patient_history.form.history_content.diseases.smoking.quit_year) }} </label>
                                          </v-col>
                                        </v-row>
                                      </v-col>
