<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5 text-center black--text">Polipíldora</h3>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="12" :md="patient_history.form.history_content.treatments.polipildora.selected.length < 3
                ? 8 + patient_history.form.history_content.treatments.polipildora.selected.length : 12" :lg="patient_history.form.history_content.treatments.polipildora.selected.length < 3
                ? 6 + patient_history.form.history_content.treatments.polipildora.selected.length : 12">
                    <v-row>
                        <v-col cols="12">
                            <h3 class="font-weight-bold black--text text-center">Es candidato:
                                <template v-if="patient_history.form.history_content.treatments.polipildora.active">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </h3>
                            <br>
                            <template v-if="patient_history.form.history_content.treatments.polipildora.active">
                                <p class="font-weight-bold black--text text-center"
                                    v-if="patient_history.form.history_content.treatments.polipildora.reason.length > 0">
                                    <b>Razón:</b>
                                    <br>
                                <p class="font-weight-normal black--text text-center"
                                    v-for="item in patient_history.form.history_content.treatments.polipildora.reason">
                                    -{{item}}
                                </p>
                                <v-row justify="center">
                                    <v-col cols="12" md="4" lg="3" v-for="item in patient_history.form.history_content.treatments.polipildora.selected">
                                        <p class="black--text text-center font-weight-bold">
                                            -{{ item.name }}. 
                                            <br>
                                            Dosis: {{ item.dosis_selected }}
                                        </p>
                                    </v-col>
                                </v-row>
                            </template>
                    </v-row>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>