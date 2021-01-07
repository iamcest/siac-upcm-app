
                                  <v-col class="full-width px-0" cols="12">
                                    <v-row>
                                      <v-col cols="12">
                                        <?php echo new Template('patients-management/view_tabs/history_parts/hta'); ?>
                                        <?php echo new Template('patients-management/view_tabs/history_parts/dtm2'); ?>
                                        <?php echo new Template('patients-management/view_tabs/history_parts/dyslipidemia'); ?>
                                        <?php echo new Template('patients-management/view_tabs/history_parts/smoking'); ?>
                                        <v-row>
                                          <v-col class="factor-risk-container px-4 py-4" cols="5">
                                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la PA - Emergencia hipertensiva</h5>
                                            <v-col class="px-0" cols="12">
                                              {{ patient_history.form.history_content.emergency_hta_history }}
                                            </v-col>
                                          </v-col> 
                                          <v-col cols="2"></v-col>
                                          <v-col class="factor-risk-container px-4 py-4" cols="5">
                                            <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la Diábetes <br><br></h5>
                                            <v-col class="px-0" cols="12">
                                              {{ patient_history.form.history_content.emergency_diabetes_history }}
                                            </v-col>
                                          </v-col> 
                                        </v-row>
                                        <v-row>
                                          <v-col class="mt-6" cols="12">
                                            <h3 class="text-h4 text-center black--text">Antecedentes de Enfermedades Cardiovasculares</h3>
                                          </v-col>
                                          <v-col class="pr-6" cols="6">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-center black--text">Cardiopatía isquémica</h3>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">IM: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.im }}</span></p>     
                                                  </v-col>

                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Año: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.age }}</span></p>                                
                                                  </v-col>  
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Angina: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.angina }}</span></p>    
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Sindrome Coronario Crónico: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.chronic_crown_syndrome }}</span></p>  
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Persiste: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.persist }}</span></p>
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Clase Funcional Canada: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.functional_class_canada }}</span></p>
                                                  </v-col>
                                                </v-row>    
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Revascularizado: <span class="font-weight-light" v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active">Sí</span>
                                                    <span v-else>No</span>
                                                    </p>     
                                                  </v-col>  
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Cirugía: 
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                    </span>
                                                  </p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Año: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.age }}</span></p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Puente: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.bridge }}</span></p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Percutánea:
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                      </span>
                                                    </p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">
                                                      Stent: 
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.stent">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                      </span>
                                                    </p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Medicado: 
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.medicated">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                      </span>
                                                    </p>
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
                                                    <p class="black--text font-weight-bold">Tipo: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.arritmia.type }}</span></p>         
                                                  </v-col>
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Tratamiento Médico: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment }}</span></p>  
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Anticoagulante: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.arritmia.anticoagulant }}</span></p>  
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Tipo: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.arritmia.anticoagulant_type }}</span></p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.arritmia.dosis }}</span></p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Recibió ablación:  
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                      </span>
                                                    </p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Año: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.arritmia.age }}</span></p>
                                                  </v-col>
                                                  <v-col cols="6">
                                                    <p class="black--text font-weight-bold">Porta CDI:
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_holder">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                      </span>
                                                    </p>
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
                                                    <p class="black--text font-weight-bold">Dx Año: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.heart_failure.dx_age }}</span></p>           
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Clase Funcional: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.heart_failure.functional_class }}</span></p>
                                                  </v-col>
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Tratamiento: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.heart_failure.treatment }}</span></p>
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Dosis: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.heart_failure.dosis }}</span></p>
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
                                                    <p class="black--text font-weight-bold">Claudicación intermitente:
                                                      <span class="font-weight-light">
                                                        <span v-if="patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.intermittent_claudication">
                                                          Sí
                                                        </span>
                                                        <span v-else>No</span>
                                                      </span>
                                                    </p>      
                                                  </v-col>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Clase Funcional: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.functional_class }}</span></p> 
                                                  </v-col>
                                                </v-row>
                                              </v-col>
                                              <v-col class="factor-risk-container" cols="6">
                                                <v-row>
                                                  <v-col cols="12">
                                                    <p class="black--text font-weight-bold">Tratamiento: <span class="font-weight-light">{{ patient_history.form.history_content.cardiovascular_diseases.peripheral_artery_disease.treatment }}</span></p>
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
                                                <h3 class="black--text text-h4">Toma antiplaquetarios</h3>
                                              </v-col>
                                            </v-row>
                                            <v-row class="factor-risk-container">
                                              <v-col cols="12">
                                                <p class="black--text">
                                                  <span>
                                                    <span v-if="patient_history.form.history_content.antiplatelet.active">
                                                      Sí
                                                    </span>
                                                    <span v-else>No</span>
                                                  </span>
                                                </p>              
                                              </v-col>
                                              <v-col cols="12">
                                                <p class="black--text font-weight-bold">Medicamento: <span class="font-weight-light">{{ patient_history.form.history_content.antiplatelet.treatment }}</span></p>                 
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col class="pl-10" cols="9">
                                            <v-row>
                                              <v-col cols="12">
                                                <h3 class="text-h4 text-center black--text font-weight-bold">Datos Significativos al Exámen Físico</h3>
                                              </v-col>
                                            </v-row>
                                            <v-row class="factor-risk-container">
                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Aspecto General</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <p class="black--text font-weight-light">{{ patient_history.form.history_content.physical_exams.general_aspect }}</p>
                                              </v-col>
                                              <v-col cols="4"></v-col>
                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">PVY</h4>
                                              </v-col>
                                              <v-col cols="3">
                                                <p class="black--text font-weight-bold">Morfología. Seno X: <span class="font-weight-light">{{ patient_history.form.history_content.physical_exams.pvy.morphology_breastx }}</span></p>  
                                              </v-col>
                                              <v-col cols="3">
                                                <p class="black--text font-weight-bold">CVY: <span class="font-weight-light">{{ patient_history.form.history_content.physical_exams.pvy.cvy }}</span></p>
                                              </v-col>

                                              <v-col cols="4"></v-col>
                                              
                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Latidos carotídeos</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <p class="black--text font-weight-light">{{ patient_history.form.history_content.physical_exams.carotid_beats }}</p>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Apex</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <p class="black--text font-weight-light">{{ patient_history.form.history_content.physical_exams.apex }}</p>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Auscultación</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <p class="black--text font-weight-light">{{ patient_history.form.history_content.physical_exams.auscultation }}</p>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <p class="black--text font-weight-light">{{ patient_history.form.history_content.physical_exams.peripheral_pulses }}</p>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                              <v-col cols="2">
                                                <h4 class="text-h6 black--text">Edema</h4>
                                              </v-col>
                                              <v-col cols="6">
                                                <p class="black--text font-weight-light">{{ patient_history.form.history_content.physical_exams.edema }}</p>
                                              </v-col>
                                              <v-col cols="4"></v-col>

                                            </v-row>
                                          </v-col>     
                                        </v-row>

                                        <v-col class="factor-risk-container mt-10" cols="8" offset="2">
                                          <v-row>
                                            <v-col cols="12">
                                              <h4 class="text-h4 text-center black--text font-weight-bold">Electro Cardiograma</h4>
                                            </v-col>
                                            <v-col cols="4">
                                              <p class="black--text font-weight-bold">Ritmo: <span class="font-weight-light">{{ patient_history.form.history_content.electro_cardiogram.rhythm }}</span></p> 

                                            </v-col>
                                            <v-col cols="4">
                                              <p class="black--text font-weight-bold">Detalle: <span class="font-weight-light">{{ patient_history.form.history_content.electro_cardiogram.detail }}</span></p> 
                                            </v-col>
                                            <v-col cols="4">
                                              <p class="black--text font-weight-bold">Ejes: <span class="font-weight-light">{{ patient_history.form.history_content.electro_cardiogram.axes }}</span></p> 
                                            </v-col>
                                            <v-col cols="12">
                                              <p class="black--text font-weight-bold">Diagnóstico: <span class="font-weight-light">{{ patient_history.form.history_content.electro_cardiogram.diagnostic }}</span></p> 
                                            </v-col>
                                          </v-row>
                                        </v-col>
                                    </v-row>
                                  </v-col> 
