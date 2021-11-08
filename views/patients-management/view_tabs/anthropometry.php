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
                    {{ getBMI(patient_anthropometry.editedItem.weight, patient_anthropometry.editedItem.height) }}
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
                    {{ getCS(patient_anthropometry.editedItem.weight, patient_anthropometry.editedItem.height) }}
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
            <h5 class="text-h5 text-center black--text">Registros Anteriores</h5>
        </v-col>
    </template>
    <v-col cols="12">
        <v-data-table :headers="views.patient_anthropometry.headers" :items="patient_anthropometry.history"
            class="elevation-1" sort-by="created_at" sort-desc>
            <template #item.weight="{ item }">
                {{ item.weight }} {{ item.weight_suffix }}
                <template v-if="patient_anthropometry.history.length > 1">
                    <br>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).weight.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).weight.percent)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #item.height="{ item }">
                {{ item.height }} {{ item.height_suffix }}
                <template v-if="patient_anthropometry.history.length > 1">
                    <br>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).height.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).height.percent)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #item.abdominal_waist="{ item }">
                {{ item.abdominal_waist }} {{ item.abdominal_waist_suffix }}
                <template v-if="patient_anthropometry.history.length > 1">
                    <br>
                    <v-badge color="primary"
                        :content=" returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).abdominal_waist.numeric))  
                        + ' (' + returnNumberSign(Math.round(getPercentDifference('anthropometry', { anthropometry: item}).abdominal_waist.percent)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #item.bmi="{ item }">
                {{ getBMI(item.weight, item.height, item.weight_suffix, item.height_suffix) }}
                <template v-if="patient_anthropometry.history.length > 1">
                    <br>
                    <v-badge color="primary"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).bmi.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).bmi.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #item.corporal_surface="{ item }">
                {{ getCS(item.weight, item.height, item.weight_suffix, item.height_suffix) }}
                <template v-if="patient_anthropometry.history.length > 1">
                    <br>
                    <v-badge color="primary"
                        :content=" returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).cs.numeric).toFixed(2)) 
                        + ' (' + returnNumberSign(parseFloat(getPercentDifference('anthropometry', { anthropometry: item}).cs.percent).toFixed(2)) + '%)'">
                    </v-badge>
                </template>
            </template>
            <template #no-data>
                <v-btn color="primary" @click="initializeAnthropometry">
                    Recargar
                </v-btn>
            </template>
        </v-data-table>
    </v-col>
</v-row>