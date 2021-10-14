<v-row>
    <v-col cols="12">
        <h3 class="text-center black--text">Arritmia</h3>
    </v-col>
    <v-col class="factor-risk-container" cols="6">
        <v-row>
            <v-col cols="12">
                <span class="black--text font-weight-bold">Tipo:
                    {{ patient_history.form.history_content.cardiovascular_diseases.arritmia.type }}</span>
            </v-col>
            <template v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.type == 'FA'">

                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">Recibió ablación:
                        <template v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12" lg="6"
                    v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation">
                    <span class="black--text font-weight-bold">Año:
                        {{ patient_history.form.history_content.cardiovascular_diseases.arritmia.ablation_age }} </span>
                </v-col>
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">Porta CDI:
                        <template
                            v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_holder">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12" lg="6"
                    v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_holder">
                    <span class="black--text font-weight-bold">Año:
                        {{ patient_history.form.history_content.cardiovascular_diseases.arritmia.cdi_age }} </span>
                </v-col>
            </template>
        </v-row>
    </v-col>
    <v-col class="factor-risk-container" cols="6">
        <v-row>
            <v-col cols="6">
                <span class="black--text font-weight-bold">Tratamiento Médico:
                    <template v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col cols="6" v-if="patient_history.form.history_content.cardiovascular_diseases.arritmia.treatment">
                <span class="black--text font-weight-bold">Cuál:
                    <template v-for="treatment in patient_history.form.history_content.cardiovascular_diseases.arritmia.treatments">
                        <br>
                        -{{ treatment }}
                    </template>
                </span>
            </v-col>
        </v-row>
    </v-col>
</v-row>