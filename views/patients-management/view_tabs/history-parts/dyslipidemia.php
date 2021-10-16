<v-col cols="12">
    <v-row class="d-flex justify-start align-center">
        <v-col class="mt-6" cols="4" md="3" lg="2">
            <h4 class="my-auto text-h6 font-weight-bold">Dislipidemia: <span
                    v-if="patient_history.form.history_content.diseases.dyslipidemia.active">Sí</span>
                <span v-else>No</span>
            </h4>
        </v-col>
        <template v-if="patient_history.form.history_content.diseases.dyslipidemia.active">
            <v-col cols="4" md="3" lg="2">
                <span class="black--text font-weight-bold">Controlado:
                    <template v-if="patient_history.form.history_content.diseases.dyslipidemia.controlled">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col cols="4" md="3" lg="2">
                <span class="black--text font-weight-bold">Diagnóstico previo:
                    <template v-if="patient_history.form.history_content.diseases.dyslipidemia.detected_previously">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col cols="2">
                <span class="black--text font-weight-bold">Fecha de diagnóstico:
                    {{ patient_history.form.history_content.diseases.dyslipidemia.diagnostic_date }}
            </v-col>
        </template>
    </v-row>
</v-col>