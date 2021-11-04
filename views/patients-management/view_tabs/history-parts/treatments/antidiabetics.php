<v-card class="px-4">
    <v-row class="mb-10">
        <v-col cols="12">
            <h3 class="text-h5">ANTIDIABÉTICOS</h3>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Metformina</h3>
                    <span class="black--text font-weight-bold">
                        <template v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.active">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.active">
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Dosis diarias:
                            {{ patient_history.form.history_content.treatments.antidiabetics.metformin.dosis}}</span>
                        <template
                            v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'metformin'  }}).dosis.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold mb-3">Frecuencia:
                            {{ patient_history.form.history_content.treatments.antidiabetics.metformin.frecuency }}</span>
                    </v-col>
                    <v-col class="mt-n4" cols="12">
                        <span class="black--text font-weight-bold">Reacciones adversas:
                            <template
                                v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col class="mt-n4" cols="12"
                        v-if="patient_history.form.history_content.treatments.antidiabetics.metformin.has_secondary_effects">
                        <span class="black--text font-weight-bold">Tipo de reacción:
                            {{ patient_history.form.history_content.treatments.antidiabetics.metformin.secondary_effects }}</span>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Insulina</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.insulin.treatment }}</span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.insulin.dosis}} UI </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'insulin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'insulin'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.insulin.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.insulin.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.insulin.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.insulin.secondary_effects }} </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Análogos de insulina</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.a_insulin.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.a_insulin.dosis}} </span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'a_insulin'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'a_insulin'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.a_insulin.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.a_insulin.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.a_insulin.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.a_insulin.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="3">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Mezclas de insulina</h3>
                    <p class="font-weight-bold black--text text-center"
                        v-for="item in patient_history.form.history_content.treatments.antidiabetics.insulin_mixtures.selected">
                        {{ item }}
                    </p>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Sulfonilúreas</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'sulfonylureas'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'sulfonylureas'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.sulfonylureas.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Glinidas</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.glinidas.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.glinidas.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'glinidas'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'glinidas'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.glinidas.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.glinidas.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.glinidas.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.glinidas.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Pioglitazona</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.pioglitazona.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.pioglitazona.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'pioglitazona'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'pioglitazona'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12 ">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.pioglitazona.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.pioglitazona.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.pioglitazona.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">I DPP-4</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.inh_dpp.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.inh_dpp.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'inh_dpp'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'inh_dpp'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.inh_dpp.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.inh_dpp.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.inh_dpp.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">I SLGT-2</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.i_slgt2.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.i_slgt2.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'i_slgt2'  }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'i_slgt2'  }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.i_slgt2.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template
                            v-if="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.i_slgt2.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.i_slgt2.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="2">
            <v-row>
                <v-col cols="12">
                    <h3 class="font-weight-bold black--text text-center">Ag Rec GLP-1</h3>
                    <span class="black--text font-weight-bold">
                        {{ patient_history.form.history_content.treatments.antidiabetics.gl.treatment }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Dosis diarias:
                        {{ patient_history.form.history_content.treatments.antidiabetics.gl.dosis}}</span>
                    <template
                        v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_history.items.length > 1">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'gl' }}).dosis.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('history', {dosis: true, treatment: {group: 'antidiabetics', treatment: 'gl' }}).dosis.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Frecuencia:
                        {{ patient_history.form.history_content.treatments.antidiabetics.gl.frecuency }} </span>
                </v-col>
                <v-col class="mt-n4" cols="12">
                    <span class="black--text font-weight-bold">Reacciones adversas:
                        <template v-if="patient_history.form.history_content.treatments.antidiabetics.gl.has_secondary_effects">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col class="mt-n4" cols="12"
                    v-if="patient_history.form.history_content.treatments.antidiabetics.gl.has_secondary_effects">
                    <span class="black--text font-weight-bold">Tipo de reacción:
                        {{ patient_history.form.history_content.treatments.antidiabetics.gl.secondary_effects }}</span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="12" md="4" lg="3">
                    <v-col cols="12">
                        <h3 class="font-weight-bold black--text text-center">
                            <template v-if="patient_history.form.history_content.treatments.antidiabetics.fdc.active">
                                El paciente tiene indicada una combinación fija de los medicamentos seleccionados
                            </template>
                            <template v-else>
                                El paciente no tiene indicada una combinación fija de los medicamentos seleccionados
                            </template>
                        </h3>
                    </v-col>
                    <v-col cols="12" v-if="patient_history.form.history_content.treatments.antidiabetics.fdc.active">
                        <h3 class="font-weight-bold black--text text-center">Combinaciones a dosis fijas</h3>
                        <p class="font-weight-bold black--text text-center"
                            v-for="item in patient_history.form.history_content.treatments.antidiabetics.fdc.selected">
                            {{ item }}
                        </p>
                    </v-col>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
</v-card>