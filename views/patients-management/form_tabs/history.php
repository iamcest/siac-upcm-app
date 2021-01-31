
                                  <v-col class="full-width px-0" cols="12">
                                    <v-row>
                                      <v-col cols="12">
                                        <?php echo new Template('patients-management/form_tabs/history_parts/hta'); ?>
                                        <?php echo new Template('patients-management/form_tabs/history_parts/dtm2'); ?>
                                        <?php echo new Template('patients-management/form_tabs/history_parts/dyslipidemia'); ?>
                                        <?php echo new Template('patients-management/form_tabs/history_parts/smoking'); ?>
                                        <v-row>
                                          <v-col class="factor-risk-container px-4 py-4" cols="5">
                                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la PA - Emergencia hipertensiva</h5>
                                            <v-textarea v-model="patient_history.form.history_content.emergency_hta_history" class="mt-3" outlined></v-textarea>
                                          </v-col> 
                                          <v-col cols="2"></v-col>
                                          <v-col class="factor-risk-container px-4 py-4" cols="5">
                                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la Diábetes <br><br></h5>
                                            <v-textarea v-model="patient_history.form.history_content.emergency_diabetes_history" class="mt-3" outlined></v-textarea>
                                          </v-col> 
                                        </v-row>
                                        <v-row>
                                          <v-col class="mt-6" cols="12">
                                            <h3 class="text-h5 text-center black--text">Antecedentes de Enfermedades Cardiovasculares</h3>
                                          </v-col>
                                          <v-col class="pr-6" cols="6">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-center black--text">Cardiopatía isquémica</h3>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="6">
                                                     <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.im" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">IM:</span>
                                                      </template>
                                                    </v-text-field>                                                 
                                                  </v-col>

                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.age" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Año:</span>
                                                      </template>
                                                    </v-text-field>                                          
                                                  </v-col>  
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.angina" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Angina:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.chronic_crown_syndrome" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Sindrome Coronario Crónico:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.persist" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Persiste:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.functional_class_canada" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Clase Funcional Canada:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                </v-row>    
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Revascularizado:</span>
                                                      </template>
                                                    </v-select>                                          
                                                  </v-col>  
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="6">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery" :items="patient_history.select" item-text="text" item-value="value" class="mt-3"  class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Cirugía:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.age" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Año:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.bridge" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Puente:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Percutánea:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.stent" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Stent:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.medicated" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Medicado:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                </v-row>    
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="pl-6" cols="6">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-center black--text">Arritmia</h3>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                     <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.type" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Tipo:</span>
                                                      </template>
                                                    </v-text-field>                                                 
                                                  </v-col>
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Tratamiento Médico:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.anticoagulant" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Anticoagulante:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.anticoagulant_type" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Tipo:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.dosis" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Dosis:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Recibió ablación:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.age" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Año:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_holder" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Porta CDI:</span>
                                                      </template>
                                                    </v-select>
                                                  </v-col>
                                                </v-row>    
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          
                                        </v-row>
                                        <v-row>
                                          <v-col class="pr-6" cols="6">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-center black--text">Insuficiencia Cardíaca</h3>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                     <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.dx_age" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Dx año:</span>
                                                      </template>
                                                    </v-text-field>                                                 
                                                  </v-col>
                                                  <v-col cols="12">
                                                     <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.functional_class" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Clase funcional:</span>
                                                      </template>
                                                    </v-text-field>                                                 
                                                  </v-col>
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <v-text-field  v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.treatment" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Tratamiento:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.heart_failure.dosis" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Dosis:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                </v-row>    
                                              </v-col>
                                            </v-row>
                                          </v-col>

                                          <v-col class="pl-6" cols="6">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-center black--text">Enfermedad Arterial Periférica</h3>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                     <v-select v-model="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.intermittent_claudication" :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Claudicación intermitente:</span>
                                                      </template>
                                                    </v-select>                                                 
                                                  </v-col>
                                                  <v-col cols="12">
                                                     <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.functional_class" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Clase funcional:</span>
                                                      </template>
                                                    </v-text-field>                                                 
                                                  </v-col>
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <v-text-field v-model="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.treatment" class="mt-3" outlined dense>
                                                      <template class="black-text" v-slot:prepend>
                                                        <span class="font-weight-bold">Tratamiento:</span>
                                                      </template>
                                                    </v-text-field>
                                                  </v-col>
                                                </v-row>    
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                        </v-row>
                                        <v-row>
                                          <v-col cols="3">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="black--text text-h5">Toma antiplaquetarios</h3>
                                              </v-col>
                                            </v-row>
                                            <v-row class="factor-risk-container">
                                              <v-col cols="12">
                                                 <v-select v-model="patient_history.form.history_content.antiplatelet.active" :items="patient_history.select" item-text="text" item-value="value" outlined dense>
                                                </v-select>                                                 
                                              </v-col>
                                              <v-col cols="12">
                                                <label class="font-weight-bold black--text">Medicamento:</label>
                                                <v-text-field v-model="patient_history.form.history_content.antiplatelet.treatment" class="mt-3" outlined dense></v-text-field>                                                 
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="pl-10" cols="9">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-h5 text-center black--text font-weight-bold">Datos Significativos al Exámen Físico</h3>
                                              </v-col>
                                            </v-row>
                                            <v-row class="factor-risk-container">
                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Aspecto General</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.general_aspect" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="4"></v-col>
                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">PVY</h4>
                                              </v-col>
                                              <v-col cols="3">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.pvy.morphology_breastx" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="black--text font-weight-bold">Morfología. Seno X</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>
                                              <v-col cols="3">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.pvy.cvy" outlined dense>
                                                  <template class="black-text" v-slot:prepend>
                                                    <span class="black--text font-weight-bold"> CVY</span>
                                                  </template>
                                                </v-text-field>
                                              </v-col>

                                              <v-col cols="4"></v-col>
                                              
                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Latidos carotídeos</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.carotid_beats" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Apex</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.apex" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Auscultación</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.auscultation" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.peripheral_pulses" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Edema</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <v-text-field v-model="patient_history.form.history_content.physical_exams.edema" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                            </v-row>
                                          </v-col>     
                                        </v-row>

                                        <v-col class="factor-risk-container mt-10" cols="8" offset="2">
                                          <v-row>
                                            <v-col cols="12">
                                              <h4 class="text-h5 text-center black--text font-weight-bold">Electro Cardiograma</h4>
                                            </v-col>
                                            <v-col cols="4">
                                              <v-text-field v-model="patient_history.form.history_content.electro_cardiogram.rhythm" class="mt-3" outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="font-weight-bold">Ritmo:</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="4">
                                              <v-text-field v-model="patient_history.form.history_content.electro_cardiogram.detail" class="mt-3" outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="font-weight-bold">Detalle:</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="4">
                                              <v-text-field v-model="patient_history.form.history_content.electro_cardiogram.axes" class="mt-3" outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="font-weight-bold">Ejes:</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                              <label class="font-weight-bold black--text subtitle-1">Diagnóstico:</label>
                                              <v-textarea v-model="patient_history.form.history_content.electro_cardiogram.diagnostic" class="mt-3" outlined dense>
                                              </v-textarea>
                                            </v-col>
                                          </v-row>
                                        </v-col>   
                                        <v-col cols="12">
                                          <v-btn color="secondary white--text" block @click="saveHistory" :loading="patient_history.loading">
                                            Guardar
                                          </v-btn>
                                        </v-col>
                                    </v-row>
                                  </v-col> 
