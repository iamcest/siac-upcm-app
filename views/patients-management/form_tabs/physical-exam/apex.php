<v-col class="mb-n10" cols="12" id="apex">
    <v-row class="d-flex align-center">
        <v-col cols="2">
            <h4 class="text-h6 black--text">Ápex</h4>
        </v-col>
        <v-col cols="9">
            <v-row>
                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.apex.is_palpated"
                        :items="patient_physical_exam.options.select" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold">Se palpa</span>
                        </template>
                    </v-select>
                </v-col>
                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.apex.displaced"
                        :items="patient_physical_exam.options.select" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold">Desplazado</span>
                        </template>
                    </v-select>
                </v-col>

                <v-col cols="6" lg="4">
                    <v-select v-model="patient_physical_exam.content.apex.characteristic"
                        :items="['Normokinético', 'Sostenido', 'Hiperdinámico']" outlined dense>
                        <template class="black-text" #prepend>
                            <span class="black--text font-weight-bold">Característica</span>
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