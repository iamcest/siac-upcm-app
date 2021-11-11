<v-row class="full-width px-4">
    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
    <v-col class="d-flex justify-end" cols="12">
        <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-4'"
            dark>Editar</v-btn>
    </v-col>
    <?php endif ?>
    <template v-if="view_dialog">
        <v-col cols="12" sm="6" md="4">
            <p class="black--text text-h6"><strong>Peso:</strong>
                <span class="font-weight-light">
                    {{ patient_anthropometry.editedItem.weight }} kg
                </span>
                <template v-if="patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry').weight.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry').weight.percent)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" sm="6" md="4">
            <p class="black--text text-h6"><strong>Talla:</strong>
                <span class="font-weight-light">
                    {{ patient_anthropometry.editedItem.height }} cm
                </span>
                <template v-if="patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry').height.numeric))  + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry').height.percent)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" sm="6" md="4">
            <p class="black--text text-h6"><strong>Cintura abdominal:</strong>
                <span class="font-weight-light">{{ patient_anthropometry.editedItem.abdominal_waist }} cm</span>
                <template v-if="patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry').abdominal_waist.numeric)) 
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry').abdominal_waist.percent)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" sm="6" md="4">
            <p class="black--text text-h6"><strong>índice Masa Corporal:</strong>
                <span class="font-weight-light">
                    {{ getBMI(patient_anthropometry.editedItem.weight, patient_anthropometry.editedItem.height).replace(' kg/m2', '') }} kg/m<sup>2</sup>
                </span>
                <template v-if="patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry').bmi.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry').bmi.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12" sm="6" md="4">
            <p class="black--text text-h6"><strong>Superficie Corporal:</strong>
                <span class="font-weight-light">
                    {{ getCS(patient_anthropometry.editedItem.weight, patient_anthropometry.editedItem.height).replace(' m2', '') }} m<sup>2</sup>
                </span>
                <template v-if="patient_anthropometry.history.length > 1">
                    <v-badge color="primary"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry').cs.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry').cs.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </p>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
        <v-col cols="12">

        </v-col>
    </template>
    <v-col cols="12">
        <?php echo new Template('patients-management/view_tabs/anthropometry/view-table') ?>
    </v-col>
</v-row>