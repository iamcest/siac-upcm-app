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
            <v-col cols="12" class="py-0"
                v-for="(item, i) in patient_history.form.history_content.cerebrovascular_disease.items">
                <v-row>
                    <v-col cols="12"
                        v-if="patient_history.form.history_content.cerebrovascular_disease.items.length > 1">
                        <v-divider></v-divider>
                    </v-col>
                    <v-col cols="12" md="6" class="mt-n4">
                        <span class="font-weight-bold black--text">Año:
                            {{ getOnlyYear(item.year) }} </span>
                    </v-col>
                    <v-col cols="12" md="6" class="mt-n4">
                        <span class="font-weight-bold black--text">Tipo:
                            {{ item.type }}.
                            <template
                                v-if="item.type == 'Isquémico'">
                                {{ item.ischemic_type }}
                            </template>
                        </span>
                    </v-col>
                </v-row>
            </v-col>
        </template>
    </v-card>
</v-container>