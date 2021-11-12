<v-col class="mb-n10" cols="12" id="ankle-arm-index">
    <v-row class="d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text mt-n6">Índice tobillo-brazo</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6">
                    <v-row>
                        <v-col cols="12">
                            <v-text-field type="text" v-model="patient_physical_exam.content.aai.range" readonly
                                outlined dense>
                                <template #append>
                                    <v-btn class="mr-n3" color="primary" style="margin-top: -6.3px"
                                        @click="patient_physical_exam.aai_dialog = true" clearable dark>
                                        TEST
                                    </v-btn>
                                </template>
                            </v-text-field>
                        </v-col>
                        <v-col class="mt-n12" cols="12" v-if="patient_physical_exam.content.aai.range != ''">
                            <v-menu v-model="patient_physical_exam.aai_results_menu" :close-on-content-click="false"
                                max-width="400px" offset-x>
                                <template #activator="{ on, attrs }">
                                    <v-btn color="primary" v-bind="attrs" v-on="on" block>
                                        Ver resultados
                                    </v-btn>
                                </template>

                                <v-card>
                                    <v-list>

                                    <v-list-item>
                                            <v-list-item-title><b>Lado izquierdo:</b>
                                                {{ patient_physical_exam.content.calc.aai.itbi }}
                                                <br>
                                                {{ patient_physical_exam.content.calc.aai.itbi_result }}
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
                                                {{ patient_physical_exam.content.calc.aai.itbd }}
                                                <br>
                                                {{ patient_physical_exam.content.calc.aai.itbd_result }}
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
                                        <v-btn color="primary"
                                            @click="patient_physical_exam.aai_results_menu = false" text>
                                            Cerrar
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-menu>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-col>
        <v-dialog v-model="patient_physical_exam.aai_dialog">
            <v-card>
                <v-toolbar elevation="0">
                    <v-toolbar-title>Calculadora del Índice Tobillo Brazo</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn icon dark @click="patient_physical_exam.aai_dialog = false">
                            <v-icon color="grey">mdi-close</v-icon>
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>

                <v-divider></v-divider>

                <v-card-text v-if="patient_physical_exam.aai_dialog">
                    <v-container fluid>
                        <?php echo new Template('patients-management/form_tabs/calculations/aai') ?>
                    </v-container>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-row>
</v-col>