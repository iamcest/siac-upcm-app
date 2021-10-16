<v-container class="px-0">
    <v-card>
        <v-col cols="12">
            <h3 class="black--text text-h5 text-center">Enfermedad cerebrovascular</h3>
        </v-col>
        <v-col cols="12" md="6">
            <span class="font-weight-bold black--text">Padece esta enfermedad:
                <template v-if="patient_history.form.history_content.cerebrovascular_disease.active">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </span>
        </v-col>
        <template v-if="patient_history.form.history_content.cerebrovascular_disease.active">

            <v-col cols="12" md="6">
                <span class="font-weight-bold black--text">Año:
                    {{ getOnlyYear(patient_history.form.history_content.cerebrovascular_disease.year) }} </span>
            </v-col>

            <v-col cols="12" md="6" class="mt-n4">
                <span class="font-weight-bold black--text">Tipo:
                    {{ patient_history.form.history_content.cerebrovascular_disease.type }}.
                    <template v-if="patient_history.form.history_content.cerebrovascular_disease.type == 'Isquémico'">
                        {{ patient_history.form.history_content.cerebrovascular_disease.ischemic_type }}
                    </template>
                </span>
            </v-col>
        </template>
    </v-card>
</v-container>