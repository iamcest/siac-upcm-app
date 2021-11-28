<v-card class="px-4">
    <v-row class="mb-10" v-if="comparison.history.<?php echo $item ?>.hasOwnProperty('history_content')">
        <v-col cols="12">
            <h3 class="text-h5 text-center black--text">Polipíldora</h3>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex justify-center">
                <v-col cols="12">
                    <v-row>
                        <v-col cols="12">
                            <p class="font-weight-bold black--text text-center">Toma polipildora:
                                <template
                                    v-if="comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.active">
                                    Sí
                                </template>
                                <template v-else>
                                    No
                                </template>
                            </p>
                            <template
                                v-if="!comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.active">
                                <p class="font-weight-bold black--text text-center">Es candidato:
                                    <template
                                        v-if="comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.candidate">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </p>
                                <br>
                                <template
                                    v-if="comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.candidate">
                                    <p class="font-weight-bold black--text text-center"
                                        v-if="comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.reason.length > 0">
                                        <b>Razón:</b>
                                        <br>
                                    <p class="font-weight-normal black--text text-center"
                                        v-for="item in comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.reason">
                                        -{{item}}
                                    </p>
                                    <v-row justify="center">
                                        <v-col cols="12" md="4" lg="3"
                                            v-for="item in comparison.history.<?php echo $item ?>.history_content.treatments.polipildora.selected">
                                            <p class="black--text text-center font-weight-bold">
                                                -{{ item.name }}.
                                                <br>
                                                Dosis: {{ item.dosis_selected }}
                                            </p>
                                        </v-col>
                                    </v-row>
                                </template>
                            </template>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="px-4 py-4" v-else>
        <p class="text-center">No se encontró información</p>
    </v-row>
</v-card>