<v-row class="factor-risk-container mb-10">
    <v-col cols="12">
        <h3 class="text-h5">HIPOLIPEMIANTES</h3>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Estatinas</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.treatment }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.dosis }} mg
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.secondary_effects }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'statins'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.statins.frecuency }}
                </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">EZT</h3>
                <label class="black--text font-weight-bold">
                    <label class="black--text font-weight-bold">
                        <template
                            v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </label>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.dosis }}</span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.secondary_effects }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ezt'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ezt.frecuency }}
                </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Fibratos</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.treatment }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.dosis }} mg
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.secondary_effects }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'fibratos'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12 ">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.fibratos.frecuency }}
                </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">Omega 3</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.treatment }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.dosis }} mg
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.secondary_effects }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'omega3'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.omega3.frecuency }}
                </label>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" md="4" lg="3">
        <v-row>
            <v-col cols="12">
                <h3 class="font-weight-bold black--text text-center">IPCSK9</h3>
                <label class="black--text font-weight-bold">Tratamiento:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.treatment }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.dosis }} mg
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'}, patient_to_compare: false}, true).dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'}, patient_to_compare: false}, true).dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Reacciones adversas:
                    <template
                        v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.has_secondary_effects">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12"
                v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.has_secondary_effects">
                <label class="black--text font-weight-bold">Tipo de reacción:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.secondary_effects }}
                </label>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <span class="black--text font-weight-bold">Dosis diarias:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.daily_dosis }}
                </span>
                <br>
                <template
                    v-if="comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.daily_dosis !== ''">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'}, patient_to_compare: false}, true).daily_dosis.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {daily_dosis: true, treatment: {disease: 'dyslipidemia', treatment: 'ipcsk9'}, patient_to_compare: false}, true).daily_dosis.percent)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col class="mt-n4" cols="12">
                <label class="black--text font-weight-bold">Frecuencia:
                    {{ comparison.history.current_patient.history_content.diseases.dyslipidemia.ipcsk9.frecuency }}
                </label>
            </v-col>
        </v-row>
    </v-col>
</v-row>