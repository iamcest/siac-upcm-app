                         
                                  <v-col cols="12">
                                    <v-data-table :headers="patient_risk_factors.headers" :items="patient_risk_factors.risk_factors" sort-by="name" class="elevation-1 full-width table_headers_lg">

                                      <template v-slot:item.diagnostic='{ item }'>
                                        <v-text-field class="mt-6" v-model="item.diagnostic" outlined dense></v-text-field>
                                      </template>
                                      <template v-slot:item.comment='{ item }'>
                                        <v-text-field class="mt-6" v-model="item.comment" outlined dense></v-text-field>
                                      </template>
                                      <template v-slot:body.append>
                                        <td>
                                          
                                        </td>
                                        <td class="d-flex justify-center py-3">
                                          <v-btn class="secondary white--text" @click="saveFactorRiskDiagnostic" :loading="patient_risk_factors.diagnostic_loading">Guardar cambios</v-btn>
                                        </td>
                                      </template>
                                      <template v-slot:no-data>
                                        <v-btn color="primary" @click="initializeFactorsRisk" >
                                          Recargar
                                        </v-btn>
                                      </template>
                                    </v-data-table>
                                  </v-col>
                                  <v-row class="mt-12">
                                    <v-col cols="12">
                                      <h4 class="text-center text-h5 grey--text text--darken-2">Seleccione la fórmula de cálculo de riesgo</h4>
                                    </v-col>
                                    <v-col class="px-6" cols="12">
                                      <v-select v-model="patient_risk_factors.selectedForm" :items="patient_risk_factors.form_risk_factors" item-text="calc_name" placeholder="Seleccione la fórmula para el cálculo de riesgo" @change="assignGeneralVars" return-object outlined dense></v-select>
                                    </v-col>
                                    <?php echo new Template('patients-management/form_tabs/calculations/aha-acc-2013-risk') ?>
                                    <?php echo new Template('patients-management/form_tabs/calculations/colesterol-ldl') ?>
                                    <?php echo new Template('patients-management/form_tabs/calculations/crci-cockgroft-gault') ?>
                                    <?php echo new Template('patients-management/form_tabs/calculations/find-risk') ?>
                                    <?php echo new Template('patients-management/form_tabs/calculations/oms-ops-risk') ?>
                                    <?php echo new Template('patients-management/form_tabs/calculations/inter-heart') ?>
                                    <v-col class="d-flex justify-center mt-2" cols="12" md="4" offset-md="4" v-if="patient_risk_factors.selectedForm.calc_name != '' && patient_risk_factors.selectedForm.obj.results != ''">
                                      <v-btn class="secondary white--text" v-on:click="saveFactorRisk()" :loading="patient_risk_factors.loading">
                                        Guardar Cálculo
                                      </v-btn>
                                    </v-col>           
                                  </v-row>                          
