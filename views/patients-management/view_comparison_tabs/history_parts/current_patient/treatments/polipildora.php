<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5 text-center">Polipíldora</h3>
    </v-col>
    <v-col cols="12">
        <v-row class="d-flex justify-center">
            <v-col cols="6" md="4" lg="3">
                <v-row>
                    <v-col cols="12">
                        <h3 class="font-weight-bold black--text text-center">Es candidato:
                            <template
                                v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.polipildora.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </h3>
                        <br>
                        <p class="font-weight-bold black--text text-center"
                            v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.polipildora.active"
                            v-for="item in comparison.history.current_patient.history_content.diseases.dyslipidemia.polipildora.selected">
                            -{{item}}
                        </p>
                </v-row>
            </v-col>
        </v-row>
    </v-col>
</v-row>