<v-row class="full-width">
    <v-col cols="12" sm="4">
        <label>Peso
            <template
                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_anthropometry.history.length > 1">
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry').weight.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry').weight.percent)) + '%)'">
                </v-badge>
            </template>
        </label>
        <v-text-field class="mt-3 append-20" v-model="patient_anthropometry.editedItem.weight" outlined>
            <template #append>
                <v-select v-model="patient_anthropometry.editedItem.weight_suffix" class="p-0 m-0 mt-n1 mb-n4"
                    :items="['kg', 'lb']" dense></v-select>
            </template>
        </v-text-field>
    </v-col>
    <v-col cols="12" sm="4">
        <label>Talla
            <template
                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_anthropometry.history.length > 1">
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry').height.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry').height.percent)) + '%)'">
                </v-badge>
            </template>
        </label>
        <v-text-field class="mt-3 append-20" v-model="patient_anthropometry.editedItem.height" outlined>
            <template #append>
                <v-select v-model="patient_anthropometry.editedItem.height_suffix" class="p-0 m-0 mt-n1 mb-n4"
                    :items="['cm', 'in']" dense></v-select>
            </template>
        </v-text-field>
    </v-col>
    <v-col cols="12" sm="4">
        <label>Cintura Abdominal
            <template
                v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_anthropometry.history.length > 1">
                <v-badge color="primary"
                    :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry').abdominal_waist.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry').abdominal_waist.percent)) + '%)'">
                </v-badge>
            </template>
        </label>
        <v-text-field class="mt-3 append-20" v-model="patient_anthropometry.editedItem.abdominal_waist" outlined>
            <template #append>
                <v-select v-model="patient_anthropometry.editedItem.abdominal_waist_suffix" class="p-0 m-0 mt-n1 mb-n4"
                    :items="['cm', 'in']" dense></v-select>
            </template>
        </v-text-field>
    </v-col>
    <v-col cols="12"
        v-if="parseInt(patient_anthropometry.editedItem.weight) != 0 || parseInt(patient_anthropometry.editedItem.height) != 0 ">
        <v-row class="d-flex justify-center">
            <v-col cols="2">
                <h5 class="text-h6">
                    IMC:{{ getBMI(patient_anthropometry.editedItem.weight, 
                        patient_anthropometry.editedItem.height,
                         patient_anthropometry.editedItem.weight_suffix, 
                         patient_anthropometry.editedItem.height_suffix).replace(' kg/m2', '') }} kg/m<sup>2</sup>
                </h5>
                <br>
                <template
                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry').bmi.numeric).toFixed(2))  + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry').bmi.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
            <v-col cols="2">
                <h5 class="text-h6">
                    SC:{{ getCS(patient_anthropometry.editedItem.weight, 
                        patient_anthropometry.editedItem.height, 
                        patient_anthropometry.editedItem.weight_suffix, 
                        patient_anthropometry.editedItem.height_suffix).replace(' m2', '') }} m<sup>2</sup>
                </h5>
                <br>
                <template
                    v-if="patient_appointments.previous_appointment.hasOwnProperty('appointment_id') && patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry').cs.numeric).toFixed(2))  + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry').cs.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <?php echo new Template('patients-management/view_tabs/anthropometry/view-table') ?>
    </v-col>
    <v-col cols="12">
        <v-btn color="secondary white--text" block @click="saveAnthropometry">
            Guardar
        </v-btn>
    </v-col>
</v-row>