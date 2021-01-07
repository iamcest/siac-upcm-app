
                                      <v-col cols="12">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <v-select v-model="patient_history.form.history_content.diseases.smoking.active" :items="patient_history.select" item-text='text' item-value='value' outlined dense>
                                              <template v-slot:prepend>
                                                <h4 class="my-auto text-h5 font-weight-bold">Tabaquismo:</h4>
                                              </template>
                                            </v-select>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10" v-if="patient_history.form.history_content.diseases.smoking.active">
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Año de inicio aproximado:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.smoking.start_year" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="12 ">
                                                <label class="black--text font-weight-bold">Año de abandono:</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.smoking.quit_year" class="black--text font-weight-bold" class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Número de cigarros al día</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.smoking.cigarettes_per_day" class="mt-3" outlined dense>
                                                </v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Test de Fageroom</label>
                                                <v-text-field v-model="patient_history.form.history_content.diseases.smoking.fageroom_test" class="mt-3" outlined dense>
                                                </v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">¿Ha dejado de fumar alguna vez?</label>
                                                <v-select class="mt-3" v-model="patient_history.form.history_content.diseases.smoking.no_smoking_frecuency" :items="patient_history.select" item-text='text' item-value='value' outlined dense></v-select>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">¿Desea dejar de fumar?</label>
                                                <v-select class="mt-3" v-model="patient_history.form.history_content.diseases.smoking.smoking_wish" :items="patient_history.select" item-text='text' item-value='value' outlined dense></v-select>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Breve consejería</label>
                                                <v-textarea class="mt-3" v-model="patient_history.form.history_content.diseases.smoking.short_advice" outlined dense></v-textarea>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-col> 
