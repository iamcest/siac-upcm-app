<v-col class="mb-n10" cols="12" id="APEX">
    <v-row class="d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">Ápex</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Se palpa:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.apex.is_palpated">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Desplazado:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.apex.displaced">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>

                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Característica:
                        {{ comparison.physical_exams.<?= $item ?>.content.apex.characteristic }}
                    </span>
                </v-col>

            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>