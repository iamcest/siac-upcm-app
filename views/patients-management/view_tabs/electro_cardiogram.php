<v-row class="factor-risk-container full-width">
    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])): ?>
    <v-col class="d-flex justify-end" cols="12">
        <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-7'"
            dark>Editar</v-btn>
    </v-col>
    <?php endif ?>

    <v-col cols="12">
        <h4 class="text-h5 text-center black--text font-weight-bold">Electro Cardiograma</h4>
    </v-col>
    <v-col cols="4">
        <span class="font-weight-bold">Ritmo: <span
                class="black--text">{{ patient_electro_cardiogram.content.rhythm }}</span></span>
    </v-col>
    <v-col cols="4" v-if="patient_electro_cardiogram.content.rhythm == 'No sinusal'">
        <span class="font-weight-bold">Tipo de ritmo: <span
                class="black--text">{{ patient_electro_cardiogram.content.arritmia_type }}</span></span>
    </v-col>
    <v-col cols="4">
        <span class="font-weight-bold">Frecuencia:
            <span class="black--text">{{ patient_electro_cardiogram.content.frecuency }}</span>
        </span>
        <v-badge color="primary"
            :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').frecuency.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').frecuency.percent)) + '%)'"
            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
        </v-badge>
    </v-col>
    <v-col cols="4">
        <span class="font-weight-bold">PR:
            <span class="black--text">
                {{ patient_electro_cardiogram.content.pr }}
            </span>
        </span>
        <v-badge color="primary"
            :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').pr.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').pr.percent)) + '%)'"
            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
        </v-badge>
    </v-col>
    <v-col cols="4">
        <span class="font-weight-bold">QRS:
            <span class="black--text">
                {{ patient_electro_cardiogram.content.axes.qrs }}
            </span>
        </span>
        <v-badge color="primary"
            :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.qrs.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.qrs.percent)) + '%)'"
            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
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
                        {{ patient_electro_cardiogram.content.axes.p }}
                    </span>
                </span>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">T:
                    <span class="black--text">
                        {{ patient_electro_cardiogram.content.axes.t }}
                    </span>
                </span>
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.t.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.t.percent)) + '%)'"
                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                </v-badge>
            </v-col>
            <v-col cols="4">
                <span class="font-weight-bold">QT: <span
                        class="black--text">{{ patient_electro_cardiogram.content.qtt }}</span></span>
            </v-col>
            <v-col class="pt-0" cols="4">
                <v-row>
                    <v-col cols="12">
                        <span class="font-weight-bold">QTc: 
                            <span
                                class="black--text">
                                {{ patient_electro_cardiogram.content.qtc_formula_selected.text }} 
                                {{ patient_electro_cardiogram.content[patient_electro_cardiogram.content.qtc_formula_selected.value] }} mseg
                            </span>
                        </span>
                    </v-col>
                    <v-col class="mt-n5" cols="12"
                        v-if="patient_electro_cardiogram.content.qt != '' && patient_electro_cardiogram.content.fc">
                        <v-menu v-model="patient_electro_cardiogram.qtc_view_results_menu"
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
                                            {{ patient_electro_cardiogram.content.rr }} seg
                                        </v-list-item-title>
                                        <v-list-item-subtitle
                                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.percent)) + '%)'">
                                            </v-badge>
                                        </v-list-item-subtitle>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-title>
                                            <b>QTc (Rautaharju):</b>
                                            {{ patient_electro_cardiogram.content.qtrau }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle
                                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtrau.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtrau.percent)) + '%)'">
                                            </v-badge>
                                        </v-list-item-subtitle>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-title>
                                            <b>QTc (Bazett):</b>
                                            {{ patient_electro_cardiogram.content.qtbaz }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle
                                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtbaz.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtbaz.percent)) + '%)'">
                                            </v-badge>
                                        </v-list-item-subtitle>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-title>
                                            <b>QTc (Framingham):</b>
                                            {{ patient_electro_cardiogram.content.qtfra }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle
                                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfra.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfra.percent)) + '%)'">
                                            </v-badge>
                                        </v-list-item-subtitle>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-title>
                                            <b>QTc (Friderica):</b>
                                            {{ patient_electro_cardiogram.content.qtfri }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle
                                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfri.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfri.percent)) + '%)'">
                                            </v-badge>
                                        </v-list-item-subtitle>
                                    </v-list-item>

                                    <v-list-item>
                                        <v-list-item-title>
                                            <b>QTC (Call):</b>
                                            {{ patient_electro_cardiogram.content.qtcal }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle
                                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                            <v-badge color="primary"
                                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtcal.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtcal.percent)) + '%)'">
                                            </v-badge>
                                        </v-list-item-subtitle>
                                    </v-list-item>
                                </v-list>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="primary"
                                        @click="patient_electro_cardiogram.qtc_view_results_menu = false" text>
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
            {{ patient_electro_cardiogram.content.diagnostic }}
        </span>
    </v-col>
</v-row>