<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5 text-center black--text">Polipíldora</h3>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="6" md="6" lg="4">
                    <v-row>
                        <v-col cols="12">
                            <h3 class="font-weight-bold black--text text-center">Es candidato:
                                <template
                                    v-if="patient_history.form.history_content.treatments.polipildora.active">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </h3>
                            <br>
                            <template
                                v-if="patient_history.form.history_content.treatments.polipildora.active">
                                <p class="black--text text-center font-weight-black">
                                    Fecha de inicio:
                                    {{ patient_history.form.history_content.treatments.polipildora.date }}
                                </p>

                                <p class="black--text text-center"
                                    v-for="item in patient_history.form.history_content.treatments.polipildora.selected">
                                    -{{item}}
                                </p>

                                <p class="font-weight-bold black--text text-center"
                                    v-if="patient_history.form.history_content.treatments.polipildora.reason.length > 0">
                                    <b>Razón:</b>
                                    <br>
                                <p class="font-weight-normal black--text text-center"
                                    v-for="item in patient_history.form.history_content.treatments.polipildora.reason">
                                    -{{item}}
                                </p>
                                </p>
                            </template>
                    </v-row>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>