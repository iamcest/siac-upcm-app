<v-dialog v-model="patient_electro_cardiogram.form_dialog">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Cálculo del QT corregido (QTc)</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="patient_electro_cardiogram.form_dialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <?php echo new Template('patients-management/form_tabs/calculations/qtc'); ?>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>
<v-form v-model="patient_electro_cardiogram.valid" lazy-validation>
    <v-row class="factor-risk-container">
        <v-col cols="12">
            <h4 class="text-h5 text-center black--text font-weight-bold">Electro Cardiograma</h4>
        </v-col>
        <v-col cols="4">
            <v-select v-model="patient_electro_cardiogram.content.rhythm" class="mt-3"
                :items="patient_electro_cardiogram.options.rhythm" outlined dense>
                <template class="black-text" #prepend>
                    <span class="font-weight-bold">Ritmo:</span>
                </template>
            </v-select>
        </v-col>
        <v-col cols="4" v-if="patient_electro_cardiogram.content.rhythm == 'No sinusal'">
            <v-text-field v-model="patient_electro_cardiogram.content.arritmia_type" class="mt-3" outlined dense>
                <template class="black-text" #prepend>
                    <span class="font-weight-bold">Tipo de ritmo:</span>
                </template>
            </v-text-field>
        </v-col>
        <v-col cols="4">
            <v-text-field type="number" v-model="patient_electro_cardiogram.content.frecuency"
                :rules="patient_electro_cardiogram.rules.frecuency" class="mt-3" outlined dense>
                <template class="black-text" #prepend>
                    <span class="font-weight-bold">Frecuencia:</span>
                </template>
            </v-text-field>
            <template
                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                <v-row class="d-flex justify-center">
                    <v-badge color="primary" v-if="patient_electro_cardiogram.valid"
                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').frecuency.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').frecuency.percent)) + '%)'">
                    </v-badge>
                </v-row>
            </template>
        </v-col>
        <v-col cols="4">
            <v-text-field type="number" v-model="patient_electro_cardiogram.content.pr"
                :rules="patient_electro_cardiogram.rules.pr" class="mt-3" outlined dense>
                <template class="black-text" #prepend>
                    <span class="font-weight-bold">PR:</span>
                </template>
            </v-text-field>
            <template
                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                <v-row class="d-flex justify-center">
                    <v-badge color="primary" v-if="patient_electro_cardiogram.valid"
                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').pr.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').pr.percent)) + '%)'">
                    </v-badge>
                </v-row>
            </template>
        </v-col>
        <v-col cols="4">
            <v-text-field type="number" v-model="patient_electro_cardiogram.content.axes.qrs"
                :rules="patient_electro_cardiogram.rules.qrs" class="mt-3" outlined dense>
                <template class="black-text" #prepend>
                    <span class="font-weight-bold">QRS:</span>
                </template>
            </v-text-field>
            <template
                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                <v-row class="d-flex justify-center">
                    <v-badge color="primary" v-if="patient_electro_cardiogram.valid"
                        :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.qrs.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.qrs.percent)) + '%)'">
                    </v-badge>
                </v-row>
            </template>
        </v-col>
        <v-col class="mt-n8 mb-n4" cols="12">
            <v-row>
                <v-col class="mb-n4" cols="12">
                    <h4 class="text-h6 text-center">Ejes °:</h4>
                </v-col>
                <v-col cols="4">
                    <v-text-field type="number" v-model="patient_electro_cardiogram.content.axes.p" class="mt-3"
                        outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">P:</span>
                        </template>
                    </v-text-field>
                </v-col>
                <v-col cols="4">
                    <v-text-field type="number" v-model="patient_electro_cardiogram.content.axes.t" class="mt-3"
                        outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">T:</span>
                        </template>
                    </v-text-field>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                        <v-row class="d-flex justify-center">
                            <v-badge color="primary" v-if="patient_electro_cardiogram.valid"
                                :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.t.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram').axes.t.percent)) + '%)'">
                            </v-badge>
                        </v-row>
                    </template>
                </v-col>
                <v-col cols="4">
                    <v-text-field v-model="patient_electro_cardiogram.content.qtt" class="mt-3" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="font-weight-bold">QT:</span>
                        </template>
                    </v-text-field>
                </v-col>

                <v-col class="pt-0" cols="4">
                    <v-row>
                        <v-col cols="12">
                            <v-text-field type="number" 
                            v-model="patient_electro_cardiogram.content[patient_electro_cardiogram.content.qtc_formula_selected.value]" 
                            class="mt-3" :prefix="patient_electro_cardiogram.content.qtc_formula_selected.text + ': '" outlined dense>
                                <template class="black-text" #prepend>
                                    <span class="font-weight-bold">QTc:</span>
                                </template>
                                <template #append>
                                    <v-btn class="mr-n3" color="primary" style="margin-top: -6.3px"
                                        @click="patient_electro_cardiogram.form_dialog = true" dark>
                                        FÓRMULA
                                    </v-btn>
                                </template>
                            </v-text-field>
                        </v-col>
                        <v-col class="mt-n12" cols="12"
                            v-if="patient_electro_cardiogram.content.qt != '' && patient_electro_cardiogram.content.fc">
                            <v-menu v-model="patient_electro_cardiogram.qtc_edit_results_menu"
                                :close-on-content-click="false" max-width="300px" offset-x>
                                <template #activator="{ on, attrs }">
                                    <v-btn color="primary" v-bind="attrs" v-on="on" block>
                                        Ver resultados
                                    </v-btn>
                                </template>

                                <v-card>
                                    <v-list>

                                        <v-list-item>
                                            <v-list-item-title><b>RR:</b> {{ patient_electro_cardiogram.content.rr }}
                                                seg
                                            </v-list-item-title>
                                            <v-list-item-subtitle
                                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.rr.percent)) + '%)'">
                                                </v-badge>
                                            </v-list-item-subtitle>
                                        </v-list-item>

                                        <v-list-item>
                                            <v-list-item-title><b>QTc (Rautaharju):</b>
                                                {{ patient_electro_cardiogram.content.qtrau }} </v-list-item-title>
                                            <v-list-item-subtitle
                                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtrau.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtrau.percent)) + '%)'">
                                                </v-badge>
                                            </v-list-item-subtitle>
                                        </v-list-item>

                                        <v-list-item>
                                            <v-list-item-title><b>QTc (Bazett):</b>
                                                {{ patient_electro_cardiogram.content.qtbaz }} </v-list-item-title>
                                            <v-list-item-subtitle
                                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtbaz.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtbaz.percent)) + '%)'">
                                                </v-badge>
                                            </v-list-item-subtitle>
                                        </v-list-item>

                                        <v-list-item>
                                            <v-list-item-title><b>QTc (Framingham):</b>
                                                {{ patient_electro_cardiogram.content.qtfra }} </v-list-item-title>
                                            <v-list-item-subtitle
                                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfra.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfra.percent)) + '%)'">
                                                </v-badge>
                                            </v-list-item-subtitle>
                                        </v-list-item>

                                        <v-list-item>
                                            <v-list-item-title><b>QTc (Friderica):</b>
                                                {{ patient_electro_cardiogram.content.qtfri }} </v-list-item-title>
                                            <v-list-item-subtitle
                                                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_electro_cardiogram.items.length > 1">
                                                <v-badge color="primary"
                                                    :content=" returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfri.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('electro-cardiogram', {qtc_calc: true}).qtc_r.qtfri.percent)) + '%)'">
                                                </v-badge>
                                            </v-list-item-subtitle>
                                        </v-list-item>

                                        <v-list-item>
                                            <v-list-item-title><b>QTC (Call):</b>
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
                                            @click="patient_electro_cardiogram.qtc_edit_results_menu = false" text>
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
            <label class="font-weight-bold black--text subtitle-1">Diagnóstico:</label>
            <v-textarea v-model="patient_electro_cardiogram.content.diagnostic" class="mt-3" outlined dense>
            </v-textarea>
        </v-col>
    </v-row>
    <v-row>
        <v-col cols="12">
            <v-btn color="secondary white--text" @click="saveElectroCardiogram"
                :loading="patient_electro_cardiogram.loading" :disabled="!patient_electro_cardiogram.valid" block>
                Guardar
            </v-btn>
        </v-col>
    </v-row>
</v-form>