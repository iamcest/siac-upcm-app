<v-col cols="12" id="ankle-arm-index">
    <v-row class="d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">Índice tobillo-brazo</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">
                        {{ comparison.physical_exams.<?= $item ?>.content.aai.range }}
                        <v-col cols="12" v-if="comparison.physical_exams.<?= $item ?>.content.aai.range != ''">
                            <v-menu v-model="patient_physical_exam.aai_results_menu" :close-on-content-click="false"
                                max-width="400px" offset-x>
                                <template #activator="{ on, attrs }">
                                    <v-btn color="primary" v-bind="attrs" v-on="on" class="ml-n3">
                                        Ver resultados
                                    </v-btn>
                                </template>

                                <v-card>
                                    <v-list>

                                        <v-list-item>
                                            <v-list-item-title><b>Lado izquierdo:</b>
                                                {{ comparison.physical_exams.<?= $item ?>.content.calc.aai.itbi }}
                                                <br>
                                                {{ comparison.physical_exams.<?= $item ?>.content.calc.aai.itbi_result }}
                                            </v-list-item-title>
                                            <!--  
                                                    <v-list-item-subtitle
                                                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>

                                                -->
                                        </v-list-item>

                                        <v-divider class="my-3"></v-divider>

                                        <v-list-item>
                                            <v-list-item-title><b>Lado derecho:</b>
                                                {{ comparison.physical_exams.<?= $item ?>.content.calc.aai.itbd }}
                                                <br>
                                                {{ comparison.physical_exams.<?= $item ?>.content.calc.aai.itbd_result }}
                                            </v-list-item-title>
                                            <!--  
                                                    <v-list-item-subtitle
                                                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>

                                                -->
                                        </v-list-item>

                                    </v-list>

                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn color="primary" @click="patient_physical_exam.aai_results_menu = false"
                                            text>
                                            Cerrar
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-menu>
                        </v-col>
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-col>