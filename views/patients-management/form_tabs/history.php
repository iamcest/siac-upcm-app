
                  <v-col class="full-width px-0" cols="12">
                    <v-row>
                      <v-col cols="12">
                        <?php echo new Template('patients-management/form_tabs/history_parts/hta'); ?>
                        <?php echo new Template('patients-management/form_tabs/history_parts/dtm2'); ?>
                        <?php echo new Template('patients-management/form_tabs/history_parts/pre_dtm2'); ?>
                        <?php echo new Template('patients-management/form_tabs/history_parts/dyslipidemia'); ?>
                        <?php echo new Template('patients-management/form_tabs/history_parts/family-history'); ?>
                        <v-row>
                          <v-col class="factor-risk-container px-4 py-4" cols="5">
                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la PA - Emergencia hipertensiva</h5>
                            <v-select v-model="patient_history.form.history_content.emergency_hta_history" :items="patient_history.select" item-text='text' item-value='value' class="mt-3" outlined></v-select>
                          </v-col>
                          <v-col cols="2"></v-col>
                          <v-col class="factor-risk-container px-4 py-4" cols="5">
                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la Diabetes <br><br></h5>
                            <v-select v-model="patient_history.form.history_content.emergency_diabetes_history" :items="patient_history.select" item-text='text' item-value='value' class="mt-3" outlined></v-select>
                          </v-col>
                        </v-row>

                        <v-row>
                          <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades Cardiovasculares</h3>
                          </v-col>
                          <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/cardiovascular_diseases/ischemic_cardiopathy') ?>
                          </v-col>
                          <v-col class="pr-6 pl-3 col col-8" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/cardiovascular_diseases/arritmia') ?>
                          </v-col>

                        </v-row>

                        <v-row>
                          <v-col class="pr-6" cols="12" md="6">
                            <?php echo new Template('patients-management/form_tabs/history_parts/cardiovascular_diseases/heart_failure') ?>
                          </v-col>

                          <v-col class="pl-6" cols="12" md="6">
                            <?php echo new Template('patients-management/form_tabs/history_parts/cardiovascular_diseases/peripheral_artery') ?>
                          </v-col>
                        </v-row>

                        <v-row>
                          <v-col cols="12" md="6" offset-md="3">
                            <?php echo new Template('patients-management/form_tabs/history_parts/cronic_kidney_disease') ?>
                          </v-col>
                        </v-row>

                        <v-row>
                          <v-col class="mt-6" cols="12">
                            <h3 class="text-h5 text-center black--text">Tratamientos</h3>
                          </v-col>
                          <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/treatments/polipildora') ?>
                          </v-col>
                          <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/treatments/hta') ?>
                          </v-col>
                          <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/treatments/dtm2') ?>
                          </v-col>
                          <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/treatments/antithrombotics') ?>
                          </v-col>
                          <v-col class="pr-6" cols="12">
                            <?php echo new Template('patients-management/form_tabs/history_parts/treatments/dyslipidemia') ?>
                          </v-col>
                        </v-row>

                        <v-col cols="12">
                          <v-btn color="secondary white--text" block @click="saveHistory" :loading="patient_history.loading">
                            Guardar
                          </v-btn>
                        </v-col>
                    </v-row>
                  </v-col>
