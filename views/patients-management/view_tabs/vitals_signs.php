                         
                                  <v-col cols="12">
                                    <v-data-table :headers="patient_vital_signs.headers" :items="patient_vital_signs.records" sort-by="take_date" :sort-desc="true" class="elevation-1 full-width">
                                    	<template slot="item" slot-scope="props">
                                    		<tr class>
	                                    		<td class="border-right text-center font-weight-bold" rowspan="6">{{ fromNow(props.item.take_date) }}</td>
	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold">Sentado</td>
		                                    		<td class="text-center">{{ props.item.sitting.pa_right_arm1 }} / {{ props.item.sitting.pa_right_arm2 }} {{ props.item.sitting.pa_suffix }}</td>
		                                    		<td class="text-center">{{ props.item.sitting.pa_left_arm1 }} / {{ props.item.sitting.pa_left_arm2 }} {{ props.item.sitting.pa_suffix }}</td>  
		                                    		<td class="text-center">{{ props.item.sitting.breathing_rate }} {{ props.item.sitting.br_suffix }}</td>  
		                                    		<td class="text-center">{{ props.item.sitting.temperature }} C°</td>
	                                    		</tr>

	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold">Acostado</td>
		                                    		<td class="text-center">{{ props.item.lying_down.pa_right_arm1 }} / {{ props.item.lying_down.pa_right_arm2 }} {{ props.item.lying_down.pa_suffix }}</td>
		                                    		<td class="text-center">{{ props.item.lying_down.pa_left_arm1 }} / {{ props.item.lying_down.pa_left_arm2 }} {{ props.item.lying_down.pa_suffix }}</td>  
		                                    		<td class="text-center">{{ props.item.lying_down.breathing_rate }} {{ props.item.lying_down.br_suffix }}</td>  
		                                    		<td class="text-center">{{ props.item.lying_down.temperature }} C°</td>
	                                    		</tr>
	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold">Sentado</td>
		                                    		<td class="text-center">{{ props.item.standing.pa_right_arm1 }} / {{ props.item.standing.pa_right_arm2 }} {{ props.item.standing.pa_suffix }}</td>
		                                    		<td class="text-center">{{ props.item.standing.pa_left_arm1 }} / {{ props.item.standing.pa_left_arm2 }} {{ props.item.standing.pa_suffix }}</td>  
		                                    		<td class="text-center">{{ props.item.standing.breathing_rate }} {{ props.item.standing.br_suffix }}</td>  
		                                    		<td class="text-center">{{ props.item.standing.temperature }} C°</td>
	                                    		</tr>
	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold border-right" rowspan="2">Promedio</td>
				                                    	<td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span> {{ getVitalSignalsAverage(props.item, 'right').pam }} {{ props.item.sitting.pa_suffix }}</td>
				                                    	<td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span>{{ getVitalSignalsAverage(props.item, 'left').pam }} {{ props.item.sitting.pa_suffix }}</td>
			                                    		<td></td>  
			                                    		<td></td>
			                                    		<tr>
				                                    		<td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span> {{ getVitalSignalsAverage(props.item, 'right').pulse_pressure }} {{ props.item.sitting.pa_suffix }}</td>
				                                    		<td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span> {{ getVitalSignalsAverage(props.item, 'left').pulse_pressure }} {{ props.item.sitting.pa_suffix }}</td>
				                                    		<td></td>  
				                                    		<td></td>                       			
			                                    		</tr>
	                                    		</tr>
                                    		</tr>
                                    	</template>
                                      <template v-slot:no-data>
                                        <v-btn color="primary" @click="initializeVitalSigns" >
                                          Recargar
                                        </v-btn>
                                      </template>
                                    </v-data-table>
                                  </v-col> 
