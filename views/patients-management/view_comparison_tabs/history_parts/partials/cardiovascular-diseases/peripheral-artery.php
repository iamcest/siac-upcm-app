<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Enfermedad Arterial Periférica</h3>
            </v-col>
            <v-col class="px-4" cols="12">
                <v-row>
                    <v-col cols="12" md="6">
                        <span class="black--text font-weight-bold">
                            <template
                                v-if="comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.peripheral_artery_disease.active">
                                Sí
                            </template>
                            <template v-else>
                                No
                            </template>
                        </span>
                    </v-col>
                    <v-col cols="12" md="6"
                        v-if="comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.peripheral_artery_disease.active">
                        <span class="black--text font-weight-bold">Territorio:
                            {{ comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.peripheral_artery_disease.territory }}
                        </span>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-card>
</v-container>