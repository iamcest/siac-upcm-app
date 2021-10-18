<v-container class="px-0">
    <v-card>
        <v-row class="px-4">
            <v-col cols="12">
                <h3 class="black--text text-h5 text-center">Enfermedad Renal Crónica</h3>
            </v-col>
            <v-col cols="12" :md="patient_history.form.history_content.cronic_kidney_disease.active ? 6 : 12">
                <span class="font-weight-bold black--text">Padece esta enfermedad:
                    <template v-if="patient_history.form.history_content.cronic_kidney_disease.active">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <template v-if="patient_history.form.history_content.cronic_kidney_disease.active">
                <v-col cols="12" md="6">
                    <span class="font-weight-bold black--text">Estadío:
                        {{ patient_history.form.history_content.cronic_kidney_disease.stadium }} </span>
                </v-col>
                <v-col cols="12" class="mt-n4">
                    <span class="font-weight-bold black--text">Diálisis:
                        <template v-if="patient_history.form.history_content.cronic_kidney_disease.dialysis">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
            </template>
        </v-row>
    </v-card>
</v-container>