
                                  <v-col class="full-width px-0" cols="12">
                                    <v-row>
                                      <v-col cols="12" v-for ="disease in patient_history.diseases">
                                        <v-row class="d-flex justify-start">
                                          <v-col cols="2">
                                            <v-select v-model="patient_history.form[disease.item_prop].had" :items="patient_history.select" item-text='text' item-value='value' outlined dense>
                                              <template v-slot:prepend>
                                                <h4 class="my-auto text-h5 font-weight-bold">{{ disease.title }}:</h4>
                                              </template>
                                            </v-select>
                                          </v-col>
                                        </v-row>
                                        <v-row class="factor-risk-container mb-10">
                                          <v-col cols="2" v-if="disease.item_prop != 'smoking'">
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Fecha de diagnóstico:</label>
                                                <v-text-field class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Tratamiento:</label>
                                                <v-select class="mt-3" outlined dense></v-select>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col cols="2" v-else>
                                            <v-row>
                                              <v-col cols="12">
                                                <label class="black--text font-weight-bold">Año de inicio aproximado:</label>
                                                <v-text-field class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                              <v-col cols="12 mt-n4">
                                                <label class="black--text font-weight-bold">Año de abandono:</label>
                                                <v-text-field class="mt-3" outlined dense></v-text-field>
                                              </v-col>
                                            </v-row>
                                          </v-col>
                                          <v-col v-for="(item, index) in disease.form" :cols="item.cols">
                                            <v-row>
                                              <template v-if="disease.item_prop != 'smoking'">
                                                <v-col cols="12">
                                                  <h3 class="font-weight-bold black--text text-center">{{ item.title }}</h3>
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-if="disease.item_prop != 'smoking'" v-slot:prepend>
                                                      <span class="font-weight-bold">Dosis:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="12 mt-n4">
                                                  <label class="black--text font-weight-bold">Frecuencia:</label>
                                                  <v-text-field class="mt-3" outlined dense></v-text-field>
                                                </v-col>
                                              </template>
                                              <template v-else>
                                                <v-col cols="12">
                                                <label class="black--text font-weight-bold">{{ item.title }}</label>
                                                  <template v-if="item.select">
                                                    <v-select class="mt-3" v-model="patient_history.form[disease.item_prop][item.prop]" :items="patient_history.select" item-text='text' item-value='value'  outlined dense>
                                                  </template>
                                                  <template v-else-if="item.textarea">
                                                    <v-textarea class="mt-3" outlined></v-textarea>
                                                  </template>
                                                  <template v-else>
                                                    <v-text-field class="mt-3" outlined dense></v-text-field>
                                                  </template>
                                                </v-col>
                                              </template>
                                            </v-row>
                                          </v-col>
                                        </v-col>
                                        <v-col class="factor-risk-container px-4 py-4" cols="5">
                                          <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la PA - Emergencia hipertensiva</h5>
                                          <v-textarea v-model="patient_history.form.emergency_hta_history" class="mt-3" outlined></v-textarea>
                                        </v-col> 
                                        <v-col cols="2"></v-col>
                                        <v-col class="factor-risk-container px-4 py-4" cols="5">
                                          <h5 class="text-h6 black--text font-weight-bold">Ha estado alguna vez hospitalizado por descompensación de la Diábetes <br><br></h5>
                                          <v-textarea v-model="patient_history.form.emergency_diabetes_history" class="mt-3" outlined></v-textarea>
                                        </v-col> 
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
                                                   <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">IM:</span>
                                                    </template>
                                                  </v-text-field>                                                 
                                                </v-col>

                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
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
                                                  <v-select class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Angina:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="12">
                                                  <v-select class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Sindrome Coronario Crónico:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="12">
                                                  <v-select class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Persiste:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="12">
                                                  <v-text-field class="mt-3" outlined dense>
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
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
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
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3"  class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Cirugía:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Año:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Puente:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Percutánea:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Stent:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" class="mt-3" outlined dense>
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
                                                   <v-text-field class="mt-3" outlined dense>
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
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Tratamiento Médico:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Anticoagulante:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Tipo:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Dosis:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Recibió ablación:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Año:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="6">
                                                  <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Porta CDI:</span>
                                                    </template>
                                                  </v-select>
                                                </v-col>
                                              </v-row>    
                                            </v-col>
                                          </v-row>
                                        </v-col>

                                        <v-col class="pr-6" cols="6">
                                          <v-row>
                                            <v-col cols="12">
                                              <h3 class="text-center black--text">Insuficiencia Cardíaca</h3>
                                            </v-col>
                                            <v-col class="factor-risk-container" cols="6">
                                              <v-row>
                                                <v-col cols="12">
                                                   <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Dx año:</span>
                                                    </template>
                                                  </v-text-field>                                                 
                                                </v-col>
                                                <v-col cols="12">
                                                   <v-text-field class="mt-3" outlined dense>
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
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Tratamiento:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                                <v-col cols="12">
                                                  <v-text-field class="mt-3" outlined dense>
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
                                                   <v-select :items="patient_history.select" item-text="text" item-value="value" class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Claudicación intermitente:</span>
                                                    </template>
                                                  </v-select>                                                 
                                                </v-col>
                                                <v-col cols="12">
                                                   <v-text-field class="mt-3" outlined dense>
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
                                                  <v-text-field class="mt-3" outlined dense>
                                                    <template class="black-text" v-slot:prepend>
                                                      <span class="font-weight-bold">Tratamiento:</span>
                                                    </template>
                                                  </v-text-field>
                                                </v-col>
                                              </v-row>    
                                            </v-col>
                                          </v-row>
                                        </v-col>

                                        <v-col cols="3">
                                          <v-row>
                                            <v-col cols="12">
                                              <h3 class="black--text text-h4">Toma antiplaquetarios</h3>
                                            </v-col>
                                          </v-row>
                                          <v-row class="factor-risk-container">
                                            <v-col cols="12">
                                               <v-select :items="patient_history.select" item-text="text" item-value="value" outlined dense>
                                              </v-select>                                                 
                                            </v-col>
                                            <v-col cols="12">
                                              <label class="font-weight-bold black--text">Medicamento:</label>
                                              <v-text-field class="mt-3" outlined dense></v-text-field>                                                 
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
                                              <v-text-field outlined dense></v-text-field>
                                            </v-col>
                                            <v-col cols="4"></v-col>
                                            <v-col cols="2">
                                              <h4 class="text-h6 black--text">PVY</h4>
                                            </v-col>
                                            <v-col cols="3">
                                              <v-text-field outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="black--text font-weight-bold">Morfología. Seno X</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="3">
                                              <v-text-field outlined dense>
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
                                              <v-text-field outlined dense></v-text-field>
                                            </v-col>
                                            <v-col cols="4"></v-col>

                                            <v-col cols="2">
                                              <h4 class="text-h6 black--text">Apex</h4>
                                            </v-col>
                                            <v-col cols="6">
                                              <v-text-field outlined dense></v-text-field>
                                            </v-col>
                                            <v-col cols="4"></v-col>

                                            <v-col cols="2">
                                              <h4 class="text-h6 black--text">Auscultación</h4>
                                            </v-col>
                                            <v-col cols="6">
                                              <v-text-field outlined dense></v-text-field>
                                            </v-col>
                                            <v-col cols="4"></v-col>

                                            <v-col cols="2">
                                              <h4 class="text-h6 black--text">Pulsos Periféricos</h4>
                                            </v-col>
                                            <v-col cols="6">
                                              <v-text-field outlined dense></v-text-field>
                                            </v-col>
                                            <v-col cols="4"></v-col>

                                            <v-col cols="2">
                                              <h4 class="text-h6 black--text">Edema</h4>
                                            </v-col>
                                            <v-col cols="6">
                                              <v-text-field outlined dense></v-text-field>
                                            </v-col>
                                            <v-col cols="4"></v-col>

                                          </v-row>
                                        </v-col>

                                        <v-col class="factor-risk-container mt-10" cols="8" offset="2">
                                          <v-row>
                                            <v-col cols="12">
                                              <h4 class="text-h4 text-center black--text font-weight-bold">Electro Cardiograma</h4>
                                            </v-col>
                                            <v-col cols="4">
                                              <v-text-field class="mt-3" outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="font-weight-bold">Ritmo:</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="4">
                                              <v-text-field class="mt-3" outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="font-weight-bold">Detalle:</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="4">
                                              <v-text-field class="mt-3" outlined dense>
                                                <template class="black-text" v-slot:prepend>
                                                  <span class="font-weight-bold">Ejes:</span>
                                                </template>
                                              </v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                              <label class="font-weight-bold black--text subtitle-1">Diagnóstico:</label>
                                              <v-textarea class="mt-3" outlined dense>
                                              </v-textarea>
                                            </v-col>
                                          </v-row>

                                        </v-col>
         
                                    </v-row>
                                  </v-col> 
