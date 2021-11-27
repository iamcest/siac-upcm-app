<v-container>
    <v-card class="px-2 py-10" width="100%">
        <v-row>
            <v-col cols="12">
                <h3 class="text-center black--text">Arritmia</h3>
            </v-col>
            <v-col class="d-flex justify-center" cols="12">
                <span class="font-weight-bold black--text">
                    <template
                        v-if="!comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.arritmia.active">
                        No ha padecido alguna
                    </template>
                </span>
            </v-col>
            <template
                v-if="comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.arritmia.active"
                v-for="item, i in comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.arritmia.items">
                <v-col class="px-4" cols="12" md="6">
                    <v-card class="px-2" outlined>
                        <v-row>
                            <v-col cols="12" lg="6">
                                <span class="black--text font-weight-bold">Tipo:
                                    {{ item.type }}</span>
                            </v-col>
                            <v-col cols="12" lg="6">
                                <span class="font-weight-bold black--text">Año: {{ getOnlyYear(item.year) }} </span>
                            </v-col>
                            <template v-if="item.type == 'FA'">

                                <v-col cols="12" lg="6">
                                    <span class="black--text font-weight-bold">Recibió ablación:
                                        <template v-if="item.ablation">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                </v-col>
                                <v-col cols="12" lg="6" v-if="item.ablation">
                                    <span class="black--text font-weight-bold">Año:
                                        {{ item.ablation_age }}
                                    </span>
                                </v-col>
                                <v-col cols="12" lg="6">
                                    <span class="black--text font-weight-bold">Porta CDI:
                                        <template v-if="item.cdi_holder">
                                            Sí
                                        </template>
                                        <template v-else>
                                            No
                                        </template>
                                    </span>
                                </v-col>
                                <v-col cols="12" lg="6" v-if="item.cdi_holder">
                                    <span class="black--text font-weight-bold">Año:
                                        {{ item.cdi_age }}
                                    </span>
                                </v-col>
                            </template>
                        </v-row>
                    </v-card>
                </v-col>
                <v-col class="px-4" cols="12" md="6">
                    <v-card class="px-2" outlined>
                        <v-row>
                            <v-col cols="12" md="6">
                                <span class="black--text font-weight-bold">Tratamiento Médico:
                                    <template v-if="item.treatment">
                                        Sí
                                    </template>
                                    <template v-else>
                                        No
                                    </template>
                                </span>
                            </v-col>
                            <v-col cols="12" md="6" v-if="item.treatment">
                                <span class="black--text font-weight-bold">Cuál:
                                    <template v-for="treatment in item.treatments">
                                        <br>
                                        -{{ treatment }}
                                    </template>
                                </span>
                            </v-col>
                        </v-row>
                    </v-card>

                </v-col>
                <v-col cols="12"
                    v-if="comparison.history.<?php echo $item ?>.history_content.cardiovascular_diseases.arritmia.items.length > 1">
                    <v-divider></v-divider>
                </v-col>
            </template>

        </v-row>
    </v-card>
</v-container>