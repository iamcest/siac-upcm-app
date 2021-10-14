<v-row>
    <v-col cols="12">
        <h3 class="text-center black--text">Cardiopatía isquémica</h3>
    </v-col>
    <v-col class="factor-risk-container" cols="12" md="6">
        <v-col cols="12">
            <h3 class="text-center black--text">Síndrome Coronario Agudo</h3>
        </v-col>
        <v-row>
            <v-col cols="12" lg="6">
                <span class="black--text font-weight-bold">
                    <template
                        v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.active">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
        </v-row>
        <v-row
            v-for="(IM, index) in patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.im">
            <template
                v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.sca.active">
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">Año: {{ getOnlyYear(IM.year) }} </span>
                </v-col>
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">IM Q:
                        <template v-if="IM.q">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">IM No Q:
                        <template v-if="IM.no_q">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Localización: {{ IM.localization }} </span>
                </v-col>
            </template>
        </v-row>
    </v-col>
    <v-col class="factor-risk-container" cols="12" md="6">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Síndrome Coronario Crónico</h3>
            </v-col>
            <v-col>
                <span class="black--text font-weight-bold">Año:
                    {{ getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.scai.year) }}
                </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col class="factor-risk-container" cols="12" md="6" offset-md="3">
        <v-col cols="8" lg="6">
            <span class="black--text font-weight-bold">Revascularizado:
                <template
                    v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </span>
        </v-col>
        <template
            v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active">
            <v-col cols="12">
                <v-row>
                    <v-col cols="12" lg="6">
                        <span class="black--text font-weight-bold">Quirúrgico:
                            <template
                                v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <template
                        v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.active">
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">Año:
                                {{ getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.year) }}
                            </span>
                        </v-col>
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">N° de Puentes:
                                {{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.bridge }}
                            </span>
                        </v-col>
                    </template>
                </v-row>
            </v-col>
            <v-col cols="12">
                <v-row>
                    <v-col cols="12" lg="6">
                        <span class="black--text font-weight-bold">Percutáneo:
                            <template
                                v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <template
                        v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.active">
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">N° de Vasos:
                                {{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.vessels }}
                            </span>
                        </v-col>
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">Stent:
                                {{ patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.stent }}
                            </span>
                        </v-col>
                        <v-col cols="12" lg="6"
                            v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.stent != ''">
                            <span class="black--text font-weight-bold">Medicado:
                                <template
                                    v-if="patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.medicated">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </span>
                        </v-col>
                    </template>
                </v-row>
            </v-col>

        </template>
        <v-col cols="12" lg="8">
            <span class="black--text font-weight-bold">Clase funcional canadiense:
                {{ getOnlyYear(patient_history.form.history_content.cardiovascular_diseases.ischemic_cardiopathy.functional_class_canada) }}
            </span>
        </v-col>
    </v-col>
</v-row>