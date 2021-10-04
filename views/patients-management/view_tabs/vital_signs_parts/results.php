                                  <v-col cols="12" v-if="patient_vital_signs.show_results">
                                    <v-data-table :headers="patient_vital_signs.headers_result" :items="patient_vital_signs.results" class="elevation-1 full-width" hide-default-footer>
                                    	<template slot="item" slot-scope="props">
                                    		<tr class>
	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold">Sentado</td>
		                                    		<td class="text-center">{{ props.item.sitting.frc }} {{ props.item.sitting.frc_suffix}}</td>
		                                    		<td class="text-center">
																						S / D
		                                    		<br>
		                                    		{{ props.item.sitting.pa_right_arm1 }} / {{ props.item.sitting.pa_right_arm2 }} mmHg</td>
		                                    		<td class="text-center">
																						S / D
		                                    		<br>
		                                    		{{ props.item.sitting.pa_left_arm1 }} / {{ props.item.sitting.pa_left_arm2 }} mmHg</td>
		                                    		<td class="text-center">{{ props.item.sitting.breathing_rate }} rpm</td>
		                                    		<td class="text-center">{{ props.item.sitting.temperature }} C°</td>
		                                    		<td class="text-center">{{ props.item.standing.sat }} %</td>
	                                    		</tr>

	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold">Acostado</td>
                                            <td class="text-center">{{ props.item.lying_down.frc }} {{ props.item.sitting.frc_suffix}}</td>
		                                    		<td class="text-center">
																						S / D
		                                    		<br>
		                                    		{{ props.item.lying_down.pa_right_arm1 }} / {{ props.item.lying_down.pa_right_arm2 }} mmHg</td>
		                                    		<td class="text-center">
																						S / D
		                                    		<br>
		                                    		{{ props.item.lying_down.pa_left_arm1 }} / {{ props.item.lying_down.pa_left_arm2 }} mmHg</td>
		                                    		<td class="text-center">{{ props.item.lying_down.breathing_rate }} rpm</td>
		                                    		<td class="text-center">{{ props.item.lying_down.temperature }} C°</td>
		                                    		<td class="text-center">{{ props.item.standing.sat }} %</td>
	                                    		</tr>
	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold">Sentado</td>
                                            <td class="text-center">{{ props.item.standing.frc }} {{ props.item.sitting.frc_suffix}}</td>
		                                    		<td class="text-center">
		                                    		S / D
		                                    		<br>
		                                    		{{ props.item.standing.pa_right_arm1 }} / {{ props.item.standing.pa_right_arm2 }} mmHg</td>
		                                    		<td class="text-center">
		                                    		S / D
		                                    		<br>
		                                    		{{ props.item.standing.pa_left_arm1 }} / {{ props.item.standing.pa_left_arm2 }} mmHg</td>
		                                    		<td class="text-center">{{ props.item.standing.breathing_rate }} rpm</td>
		                                    		<td class="text-center">{{ props.item.standing.temperature }} C°</td>
		                                    		<td class="text-center">{{ props.item.standing.sat }} %</td>
	                                    		</tr>
	                                    		<tr>
		                                    		<td class="grey--text font-weight-bold border-right" rowspan="2">Promedio</td>
                                              <td class="text-center"><span class="font-weight-bold">Frecuencia Cardiaca: </span> <br>{{ getFRCAverage([props.item.standing.frc, props.item.sitting.frc, props.item.lying_down.frc]) }}</td>
				                                    	<td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span> {{ getVitalSignalsAverage(props.item, 'right').pam }} {{ props.item.sitting.pa_suffix }}
				                                    	<br>
																							<b>S: </b> {{ getSDverage([props.item.sitting.pa_right_arm1, props.item.lying_down.pa_right_arm1, props.item.standing.pa_right_arm1]) }}
				                                    	<b>D: </b> {{ getSDverage([props.item.sitting.pa_right_arm2, props.item.lying_down.pa_right_arm2, props.item.standing.pa_right_arm2]) }}
				                                    	</td>
				                                    	<td class="text-center"><span class="font-weight-bold">Presión Arterial Media: </span>{{ getVitalSignalsAverage(props.item, 'left').pam }} mmHg
				                                    	<br>
				                                    	<b>S: </b> {{ getSDverage([props.item.sitting.pa_left_arm1, props.item.lying_down.pa_left_arm1, props.item.standing.pa_left_arm1]) }}
				                                    	<b>D: </b> {{ getSDverage([props.item.sitting.pa_left_arm2, props.item.lying_down.pa_left_arm2, props.item.standing.pa_left_arm2]) }}
				                                    	</td>
				                                    	<td></td>
			                                    		<td></td>
			                                    		<td></td>
			                                    		<tr>
                                                <td></td>
				                                    		<td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span> {{ getVitalSignalsAverage(props.item, 'right').pulse_pressure }} {{ props.item.sitting.pa_suffix }}</td>
				                                    		<td class="text-center"><span class="font-weight-bold">Presión del Pulso:</span> {{ getVitalSignalsAverage(props.item, 'left').pulse_pressure }} mmHg</td>
				                                    		<td></td>
				                                    		<td></td>
				                                    		<td></td>
			                                    		</tr>
	                                    		</tr>
                                    		</tr>
                                    	</template>
                                      <template v-slot:no-data>
                                        No se han generado resultados de las tomas aún
                                      </template>
                                    </v-data-table>
                                  </v-col>
