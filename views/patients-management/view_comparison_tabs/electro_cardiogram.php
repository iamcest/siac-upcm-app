<template
    v-if="viewPatientsComparisonDialog && comparison.electro_cardiogram.current_patient.hasOwnProperty('content')">
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{ comparison.patient_selected.full_name }}
        </h4>
    </v-col>
    <v-col cols="6">
        <h4 class="text-h5 text-center"><b>Paciente:</b>
            {{ comparison.patient_to_compare.full_name }}
        </h4>
    </v-col>
    <v-col cols="6" id="electro_cardiogram_cp">
        <v-row class="factor-risk-container">
            <v-col cols="4">
                <span class="font-weight-bold">Ritmo: <span
                        class="black--text">{{ comparison.electro_cardiogram.current_patient.content.rhythm }}</span></span>
            </v-col>
            <v-col cols="4" v-if="comparison.electro_cardiogram.current_patient.content.rhythm == 'No sinusal'">
                <span class="font-weight-bold">Tipo de arritmia: <span
                        class="black--text">{{ comparison.electro_cardiogram.current_patient.content.arritmia_type }}</span></span>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">Frecuencia:
                    <span
                        class="black--text">{{ comparison.electro_cardiogram.current_patient.content.frecuency }}</span>
                </span>
                <br>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).frecuency.numeric)) 
                    + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).frecuency.percent)) + '%)'"
                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                </v-badge>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">PR:
                    <span class="black--text">
                        {{ comparison.electro_cardiogram.current_patient.content.pr }}
                    </span>
                </span>
                <br>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).pr.numeric)) 
                    + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).pr.percent)) + '%)'"
                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                </v-badge>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">QRS:
                    <span class="black--text">
                        {{ comparison.electro_cardiogram.current_patient.content.axes.qrs }}
                    </span>
                </span>
                <br>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).axes.qrs.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).axes.qrs.percent)) + '%)'"
                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                </v-badge>
            </v-col>
            <v-col class="mt-n8 mb-n4" cols="12">
                <v-row>
                    <v-col class="mb-n4" cols="12">
                        <h4 class="text-h6 text-center">Ejes °:</h4>
                    </v-col>
                    <v-col cols="4">
                        <span class="font-weight-bold">P:
                            <span class="black--text">
                                {{ comparison.electro_cardiogram.current_patient.content.axes.p }}
                            </span>
                        </span>
                    </v-col>
                    <v-col cols="4">
                        <span class="font-weight-bold">T:
                            <span class="black--text">
                                {{ comparison.electro_cardiogram.current_patient.content.axes.t }}
                            </span>
                        </span>
                        <br>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).axes.t.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: false }, true).axes.t.percent)) + '%)'"
                            v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                        </v-badge>
                    </v-col>
                    <v-col cols="4">
                        <span class="font-weight-bold">QT: <span
                                class="black--text">{{ comparison.electro_cardiogram.current_patient.content.qtt }}</span></span>
                    </v-col>
                    <v-col class="pt-0" cols="4">
                        <v-row>
                            <v-col cols="12">
                                <span class="font-weight-bold">QTc: <span
                                        class="black--text">{{ comparison.electro_cardiogram.current_patient.content.qtc }}
                                    </span></span>
                            </v-col>
                            <v-col class="mt-n5" cols="12"
                                v-if="comparison.electro_cardiogram.current_patient.content.qt != '' && comparison.electro_cardiogram.current_patient.content.fc">
                                <v-menu v-model="comparison.electro_cardiogram.current_patient.qtc_view_results_menu"
                                    :close-on-content-click="false" max-width="300px" offset-x>
                                    <template #activator="{ on, attrs }">
                                        <v-btn color="primary" v-bind="attrs" v-on="on">
                                            Ver resultados
                                        </v-btn>
                                    </template>

                                    <v-card>
                                        <v-list>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>RR:</b>
                                                    {{ comparison.electro_cardiogram.current_patient.content.rr }} seg
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.rr.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.rr.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Rautaharju):</b>
                                                    {{ comparison.electro_cardiogram.current_patient.content.qtrau }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtrau.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtrau.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Bazett):</b>
                                                    {{ comparison.electro_cardiogram.current_patient.content.qtbaz }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtbaz.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtbaz.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Framingham):</b>
                                                    {{ comparison.electro_cardiogram.current_patient.content.qtfra }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtfra.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtfra.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Friderica):</b>
                                                    {{ comparison.electro_cardiogram.current_patient.content.qtfri }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtfri.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtfri.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTC (Call):</b>
                                                    {{ comparison.electro_cardiogram.current_patient.content.qtcal }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.current_patient.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtcal.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: false}, true).qtc_r.qtcal.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>
                                        </v-list>

                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn color="primary"
                                                @click="comparison.electro_cardiogram.current_patient.qtc_view_results_menu = false"
                                                text>
                                                Cerrar
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-menu>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>


            <v-col cols="12">
                <label class="font-weight-bold subtitle-1">Diagnóstico:</label>
                <span class="black--text">
                    {{ comparison.electro_cardiogram.current_patient.content.diagnostic }}
                </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="6" id="electro_cardiogram_ptc">
        <v-row class="factor-risk-container">
            <v-col cols="4">
                <span class="font-weight-bold">Ritmo: <span
                        class="black--text">{{ comparison.electro_cardiogram.patient_to_compare.content.rhythm }}</span></span>
            </v-col>
            <v-col cols="4" v-if="comparison.electro_cardiogram.patient_to_compare.content.rhythm == 'No sinusal'">
                <span class="font-weight-bold">Tipo de ritmo: <span
                        class="black--text">{{ comparison.electro_cardiogram.patient_to_compare.content.arritmia_type }}</span></span>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">Frecuencia:
                    <span
                        class="black--text">{{ comparison.electro_cardiogram.patient_to_compare.content.frecuency }}</span>
                </span>
                <br>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).frecuency.numeric)) 
                    + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).frecuency.percent)) + '%)'"
                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                </v-badge>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">PR:
                    <span class="black--text">
                        {{ comparison.electro_cardiogram.patient_to_compare.content.pr }}
                    </span>
                </span>
                <br>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).pr.numeric)) 
                    + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).pr.percent)) + '%)'"
                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                </v-badge>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">QRS:
                    <span class="black--text">
                        {{ comparison.electro_cardiogram.patient_to_compare.content.axes.qrs }}
                    </span>
                </span>
                <br>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).axes.qrs.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).axes.qrs.percent)) + '%)'"
                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                </v-badge>
            </v-col>
            <v-col class="mt-n8 mb-n4" cols="12">
                <v-row>
                    <v-col class="mb-n4" cols="12">
                        <h4 class="text-h6 text-center">Ejes °:</h4>
                    </v-col>
                    <v-col cols="4">
                        <span class="font-weight-bold">P:
                            <span class="black--text">
                                {{ comparison.electro_cardiogram.patient_to_compare.content.axes.p }}
                            </span>
                        </span>
                    </v-col>

                    <v-col cols="4">
                        <span class="font-weight-bold">T:
                            <span class="black--text">
                                {{ comparison.electro_cardiogram.patient_to_compare.content.axes.t }}
                            </span>
                        </span>
                        <br>
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).axes.t.numeric)) 
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', { patient_to_compare: true }, true).axes.t.percent)) + '%)'"
                            v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                        </v-badge>
                    </v-col>
                    <v-col cols="4">
                        <span class="font-weight-bold">QT: <span
                                class="black--text">{{ comparison.electro_cardiogram.patient_to_compare.content.qtt }}</span></span>
                    </v-col>
                    <v-col class="pt-0" cols="4">
                        <v-row>
                            <v-col cols="12">
                                <span class="font-weight-bold">QTc: <span
                                        class="black--text">{{ comparison.electro_cardiogram.patient_to_compare.content.qtc }}
                                    </span></span>
                            </v-col>
                            <v-col class="mt-n5" cols="12"
                                v-if="comparison.electro_cardiogram.patient_to_compare.content.qt != '' && comparison.electro_cardiogram.patient_to_compare.content.fc">
                                <v-menu v-model="comparison.electro_cardiogram.patient_to_compare.qtc_view_results_menu"
                                    :close-on-content-click="false" max-width="300px" offset-x>
                                    <template #activator="{ on, attrs }">
                                        <v-btn color="primary" v-bind="attrs" v-on="on">
                                            Ver resultados
                                        </v-btn>
                                    </template>

                                    <v-card>
                                        <v-list>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>RR:</b>
                                                    {{ comparison.electro_cardiogram.patient_to_compare.content.rr }}
                                                    seg
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.rr.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.rr.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Rautaharju):</b>
                                                    {{ comparison.electro_cardiogram.patient_to_compare.content.qtrau }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtrau.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtrau.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Bazett):</b>
                                                    {{ comparison.electro_cardiogram.patient_to_compare.content.qtbaz }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtbaz.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtbaz.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Framingham):</b>
                                                    {{ comparison.electro_cardiogram.patient_to_compare.content.qtfra }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtfra.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtfra.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTc (Friderica):</b>
                                                    {{ comparison.electro_cardiogram.patient_to_compare.content.qtfri }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtfri.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtfri.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>

                                            <v-list-item>
                                                <v-list-item-title>
                                                    <b>QTC (Call):</b>
                                                    {{ comparison.electro_cardiogram.patient_to_compare.content.qtcal }}
                                                </v-list-item-title>
                                                <v-list-item-subtitle
                                                    v-if="comparison.electro_cardiogram.patient_to_compare.hasOwnProperty('patient_id')">
                                                    <v-badge color="primary"
                                                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtcal.numeric)) 
                                                + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true, patient_to_compare: true}, true).qtc_r.qtcal.percent)) + '%)'">
                                                    </v-badge>
                                                </v-list-item-subtitle>
                                            </v-list-item>
                                        </v-list>

                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn color="primary"
                                                @click="comparison.electro_cardiogram.patient_to_compare.qtc_view_results_menu = false"
                                                text>
                                                Cerrar
                                            </v-btn>
                                        </v-card-actions>
                                    </v-card>
                                </v-menu>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>


            <v-col cols="12">
                <label class="font-weight-bold subtitle-1">Diagnóstico:</label>
                <span class="black--text">
                    {{ comparison.electro_cardiogram.patient_to_compare.content.diagnostic }}
                </span>
            </v-col>
        </v-row>
    </v-col>
</template>