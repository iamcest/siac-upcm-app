                                  
                                  <v-row class="full-width">                                   
                                    <v-col cols="12" md="6">
                                      <v-data-table :headers="patient_risk_factors.headers" :items="patient_risk_factors.risk_factors" sort-by="name" class="elevation-1 table_headers_lg">

                                        <template v-slot:no-data>
                                          <v-btn color="primary" @click="initializeFactorsRisk" >
                                            Recargar
                                          </v-btn>
                                        </template>
                                      </v-data-table>
                                    </v-col>
                                    <v-col class="mb-6" cols="12" md="6" v-for="risk_factor in patient_risk_factors.form_risk_factors" v-if="!patient_risk_factors.risk_factors_loaded">
                                      <h3 class="text-h5 text-center black--text mb-4">{{ risk_factor.calc_name }}</h3>
                                      <v-data-table :headers="patient_risk_factors.risk_factor_headers" class="elevation-1 table_headers_lg" :items="getRiskFactorData(risk_factor.calc_name)">
                                        <template v-slot:item.results="{ item }">
                                          {{ item.results }} {{ risk_factor.nomenclature }}
                                        </template>
                                        <template v-slot:no-data>
                                          No se encontraron resultados
                                        </template>
                                      </v-data-table>
                                    </v-col>
                                  </row>                
