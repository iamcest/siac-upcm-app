<v-row>
    <v-col cols="12">
        <h3 class="text-center black--text">Cardiopatía isquémica</h3>
    </v-col>
    <v-col class="factor-risk-container" cols="6" style="max-height: 80vh; overflow-y: auto;">
        <v-col cols="12">
            <h3 class="text-center black--text">Síndrome Coronario Agudo</h3>
        </v-col>
        <v-row
            v-for="(IM, index) in comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.im">
            <v-col cols="12" lg="6" v-if="index == 0">
                <span class="black--text font-weight-bold">IM:
                    <template
                        v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.has_im">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <template
                v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.has_im">
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">IM Q:
                        <template
                            v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.im[index].q">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">IM No Q:
                        <template
                            v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.im[index].no_q">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12" lg="6">
                    <span class="black--text font-weight-bold">Año: {{ getOnlyYear(IM.age) }} </span>
                </v-col>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Localización:
                        {{ comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.im[index].localization }}
                    </span>
                </v-col>
            </template>
        </v-row>
    </v-col>
    <v-col class="factor-risk-container" cols="6">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Síndrome Coronario Crónico</h3>
            </v-col>
        </v-row>
    </v-col>
    <v-col class="factor-risk-container" cols="12" md="6" offset-md="3">
        <v-col cols="8" lg="6">
            <span class="black--text font-weight-bold">Revascularizado:
                <template
                    v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </span>
        </v-col>
        <template
            v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.active">
            <v-col cols="12">
                <v-row>
                    <v-col cols="12" lg="6">
                        <span class="black--text font-weight-bold">Quirúrgico:
                            <template
                                v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <template
                        v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.active">
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">Año:
                                {{ getOnlyYear(comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.year) }}
                            </span>
                        </v-col>
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">N° de Puentes:
                                {{ comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.surgery.bridge }}
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
                                v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <template
                        v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.active">
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">N° de Vasos:
                                {{ comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.vessels }}
                            </span>
                        </v-col>
                        <v-col cols="12" lg="6">
                            <span class="black--text font-weight-bold">Stent:
                                {{ comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.stent }}
                            </span>
                        </v-col>
                        <v-col cols="12" lg="6"
                            v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.stent != ''">
                            <span class="black--text font-weight-bold">Medicado:
                                <template
                                    v-if="comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.revascularized.percutaneous.medicated">
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
                {{ getOnlyYear(comparison.history.current_patient.history_content.cardiovascular_diseases.ischemic_cardiopathy.functional_class_canada) }}
            </span>
        </v-col>
    </v-col>
</v-row>