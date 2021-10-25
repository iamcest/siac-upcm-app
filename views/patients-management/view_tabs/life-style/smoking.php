<v-col cols="12">
    <v-row class="d-flex justify-start">
        <v-col cols="4" md="3" lg="2">
            <h4 class="my-auto text-h6 font-weight-bold">Tabaquismo:
                <span class="black--text">
                    <template v-if="patient_life_style.editedItem.smoking.active">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </h4>
        </v-col>
    </v-row>
    <v-row class="mb-10" v-if="parseInt(patient_life_style.editedItem.smoking.active)">
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Año de inicio aproximado:
                        {{ getOnlyYear(patient_life_style.editedItem.smoking.start_year) }} </span>
                </v-col>
                <v-col cols="12"
                    v-if="!parseInt(patient_life_style.editedItem.smoking.active)
                || parseInt(patient_life_style.editedItem.smoking.active) && parseInt(patient_life_style.editedItem.smoking.no_smoking_frecuency)">
                    <span class="black--text font-weight-bold">Año de abandono:
                        {{ getOnlyYear(patient_life_style.editedItem.smoking.quit_year) }} </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Número de cigarros al día:
                        {{ patient_life_style.editedItem.smoking.cigarettes_per_day }} </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Test de Fagerström:
                        {{ patient_life_style.editedItem.smoking.fagerstrom_test }}<template
                            v-if="patient_life_style.editedItem.smoking.fagerstrom_test != ''">.
                            {{ getFagerStromScoreDescription(false) }}</template></span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">¿Ha dejado de fumar alguna vez?
                        <template v-if="patient_life_style.editedItem.smoking.no_smoking_frecuency">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">¿Desea dejar de fumar?
                        <template v-if="patient_life_style.editedItem.smoking.smoking_wish">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template v-if="patient_life_style.editedItem.smoking.no_smoking_frecuency">
                    <v-col cols="12">
                        <span class="black--text font-weight-bold">Hace cuánto tiempo:
                            {{ patient_life_style.editedItem.smoking.last_time }}</span>
                    </v-col>
                    <v-col cols="12" class="mt-n4">
                        <span class="black--text font-weight-bold">Cuántas veces:
                            {{ patient_life_style.editedItem.smoking.how_many_times }} </span>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">
                        Breve consejería:
                        <template v-if="patient_life_style.editedItem.smoking.short_advice.done">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <v-col cols="12"
                    v-if="patient_life_style.editedItem.smoking.short_advice.done
                                              && patient_life_style.editedItem.smoking.short_advice.material.material_name !== '' && 1 == 2">
                    <span class="black--text font-weight-bold">Material seleccionado:
                        {{ patient_life_style.editedItem.smoking.short_advice.material.material_name }}
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="factor-risk-container mb-10" v-if="!patient_life_style.editedItem.smoking.active">
        <v-col cols="6" md="4" lg="2">
            <span class="black--text font-weight-bold">¿Fumó alguna vez?
                <template v-if="patient_life_style.editedItem.smoking.did_smoke">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </span>
        </v-col>
        <v-col cols="6" md="4" lg="2" v-if="parseInt(patient_life_style.editedItem.smoking.did_smoke)">
            <span class="black--text font-weight-bold">Año de abandono:
                {{ getOnlyYear(patient_life_style.editedItem.smoking.quit_year) }} </span>
        </v-col>
    </v-row>
</v-col>