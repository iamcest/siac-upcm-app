<v-col cols="12">
    <v-row class="d-flex justify-start align-center">
        <v-col class="mt-6" cols="6" md="4" lg="3">
            <h4 class="my-auto text-h6 font-weight-bold">DMt2: <span
                    v-if="comparison.history.<?php echo $item ?>.history_content.diseases.pre_dtm2.active">Sí</span>
                <span v-else>No</span>
            </h4>
        </v-col>
        <template v-if="comparison.history.<?php echo $item ?>.history_content.diseases.pre_dtm2.active">
            <v-col cols="6" md="4" lg="3">
                <span class="black--text font-weight-bold">Controlado:
                    <template
                        v-if="comparison.history.<?php echo $item ?>.history_content.diseases.pre_dtm2.controlled">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col cols="6" md="4" lg="3">
                <span class="black--text font-weight-bold">Diagnóstico previo:
                    <template
                        v-if="comparison.history.<?php echo $item ?>.history_content.diseases.pre_dtm2.detected_previously">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </v-col>
            <v-col cols="6" md="4" lg="3">
                <span class="black--text font-weight-bold">Fecha de diagnóstico:
                    {{ comparison.history.<?php echo $item ?>.history_content.diseases.pre_dtm2.diagnostic_date }}</span>
            </v-col>
        </template>
    </v-row>
</v-col>