<v-col class="mb-n10" cols="12" id="LC">
    <v-row class="d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text">Latidos carotídeos</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.carotid_beats.symmetrical"
                        :items="patient_physical_exam.options.select" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold"> Simétricos</span>
                        </template>
                    </v-select>
                </v-col>

                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.carotid_beats.homochroto"
                        :items="patient_physical_exam.options.select" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold">Homócroto</span>
                        </template>
                    </v-select>
                </v-col>

                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.carotid_beats.normal_amplitude"
                        :items="patient_physical_exam.options.select" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold">Amplitud normal</span>
                        </template>
                    </v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>