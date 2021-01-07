
															<v-row class="full-width px-4">
	                              <v-col cols="12" sm="6" md="4">
	                                <p class="black--text text-h6"><strong>Peso:</strong> <span class="font-weight-light"> {{ patient_anthropometry.weight }} kg</span></p>
	                              </v-col>
	                              <v-col cols="12" sm="6" md="4">
	                                <p class="black--text text-h6"><strong>Talla:</strong> <span class="font-weight-light"> {{ patient_anthropometry.height }} cm</span></p>
	                              </v-col>
	                              <v-col cols="12" sm="6" md="4">
	                                <p class="black--text text-h6"><strong>Cintura abdominal:</strong> {{ patient_anthropometry.abdominal_waist }} cm <span class="font-weight-light"></span></p>
	                              </v-col>
	                              <v-col cols="12" sm="6" md="4">
	                                <p class="black--text text-h6"><strong>índice Masa Corporal:</strong> {{ getBMI(patient_anthropometry.weight, patient_anthropometry.height) }} <span class="font-weight-light"></span></p>
	                              </v-col>
	                              <v-col cols="12" sm="6" md="4">
	                                <p class="black--text text-h6"><strong>Superficie Corporal:</strong> {{ getCS(patient_anthropometry.weight, patient_anthropometry.height) }} <span class="font-weight-light"></span></p>
	                              </v-col>
	                              <v-col cols="12">
	                              	<v-divider></v-divider>
	                              </v-col>
	                              <v-col cols="12">
		                              <h5 class="text-h5 text-center grey--text">Registros Anteriores</h5>
	                              </v-col>
                                <v-col cols="12">
                                  <v-data-table :headers="views.patient_anthropometry.headers" :items="patient_anthropometry.history" class="elevation-1">
                                    <template v-slot:item.anthropometry_date="{ item }">
                                    	{{ fromNow(item.anthropometry_date) }}
                                    </template>
                                    <template v-slot:item.weight="{ item }">
                                    	{{ item.weight }} kg
                                    </template>
                                    <template v-slot:item.height="{ item }">
                                    	{{ item.height }} cm
                                    </template>
                                    <template v-slot:item.abdominal_waist="{ item }">
                                    	{{ item.abdominal_waist }} cm
                                    </template>
                                    <template v-slot:item.bmi="{ item }">
                                    	{{ getBMI(item.weight, item.height) }}
                                    </template>
                                    <template v-slot:item.corporal_surface="{ item }">
                                    	{{ getCS(item.weight, item.height) }}
                                    </template>
                                    <template v-slot:no-data>
                                      <v-btn color="primary" @click="initializeAnthropometry" >
                                        Recargar
                                      </v-btn>
                                    </template>
                                  </v-data-table>
                                </v-col> 
															</v-row>
