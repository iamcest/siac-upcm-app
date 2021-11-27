<v-col class="mb-n10" cols="12" id="LC">
    <v-row class="d-flex align-center">
        <v-col cols="3">
            <h4 class="text-h6 black--text">Latidos carotídeos</h4>
        </v-col>
        <v-col cols="8">
            <v-row>
                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold"> Simétricos:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.carotid_beats.symmetrical">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>

                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Homócroto:
                        <template v-if="comparison.physical_exams.<?= $item ?>.content.carotid_beats.homochroto">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>

                <v-col cols="6" lg="4">
                    <span class="black--text font-weight-bold">Amplitud normal:
                        <template
                            v-if="comparison.physical_exams.<?= $item ?>.content.carotid_beats.normal_amplitude">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>