<v-col cols="12">
    <v-row class="d-flex justify-start">
        <v-col cols="4">
            <h4 class="my-auto text-h6 font-weight-bold">Tabaquismo:
                <span class="black--text">
                    <template v-if="comparison.life_style.<?= $item ?>.smoking.active">
                        Sí
                    </template>
                    <template v-else>
                        No
                    </template>
                </span>
            </h4>
        </v-col>
    </v-row>
    <v-row class="mb-10" v-if="parseInt(comparison.life_style.<?= $item ?>.smoking.active)">
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Año de inicio aproximado:
                        {{ getOnlyYear(comparison.life_style.<?= $item ?>.smoking.start_year) }} </span>
                </v-col>
                <v-col cols="12"
                    v-if="!parseInt(comparison.life_style.<?= $item ?>.smoking.active)
                || parseInt(comparison.life_style.<?= $item ?>.smoking.active) && parseInt(comparison.life_style.<?= $item ?>.smoking.no_smoking_frecuency)">
                    <span class="black--text font-weight-bold">Año de abandono:
                        {{ getOnlyYear(comparison.life_style.<?= $item ?>.smoking.quit_year) }} </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Número de cigarros al día:
                        {{ comparison.life_style.<?= $item ?>.smoking.cigarettes_per_day }} </span>
                    <template
                        v-if="
                        comparison.life_style.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.hasOwnProperty('smoking')
                        &&
                        comparison.life_style.<?= $item == 'current_patient' ? 'patient_to_compare' : 'current_patient' ?>.smoking.active">
                        <br>
                        <v-badge class="badge-na mb-2" color="primary"
                            :content="
                            returnNumberSign(Math.round(getPercentDifference('life-style',
                            {patient_to_compare: <?= $patient_to_compare ?>}, true).smoking.cigarettes_per_day.numeric))  
                            + ' (' + returnNumberSign(Math.round(getPercentDifference('life-style',
                            {patient_to_compare: <?= $patient_to_compare ?>}, true).smoking.cigarettes_per_day.percent)) + '%)'"
                            >
                        </v-badge>
                    </template>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">Test de Fagerström:
                        {{ comparison.life_style.<?= $item ?>.smoking.fagerstrom_test }}<template
                            v-if="comparison.life_style.<?= $item ?>.smoking.fagerstrom_test != ''">.
                            {{ getFagerStromScoreDescription(false) }}</template></span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">¿Ha dejado de fumar alguna vez?
                        <template v-if="comparison.life_style.<?= $item ?>.smoking.no_smoking_frecuency">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">¿Desea dejar de fumar?
                        <template v-if="comparison.life_style.<?= $item ?>.smoking.smoking_wish">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
                <template v-if="comparison.life_style.<?= $item ?>.smoking.no_smoking_frecuency">
                    <v-col cols="12">
                        <span class="black--text font-weight-bold">Hace cuánto tiempo:
                            {{ comparison.life_style.<?= $item ?>.smoking.last_time }}</span>
                    </v-col>
                    <v-col cols="12" class="mt-n4">
                        <span class="black--text font-weight-bold">Cuántas veces:
                            {{ comparison.life_style.<?= $item ?>.smoking.how_many_times }} </span>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="3">
            <v-row>
                <v-col cols="12">
                    <span class="black--text font-weight-bold">
                        Breve consejería:
                        <template v-if="comparison.life_style.<?= $item ?>.smoking.short_advice.done">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="factor-risk-container mb-10" v-if="!comparison.life_style.<?= $item ?>.smoking.active">
        <v-col cols="6" md="4" lg="3">
            <span class="black--text font-weight-bold">¿Fumó alguna vez?
                <template v-if="comparison.life_style.<?= $item ?>.smoking.did_smoke">
                    Sí
                </template>
                <template v-else>
                    No
                </template>
            </span>
        </v-col>
        <v-col cols="6" md="4" lg="3" v-if="parseInt(comparison.life_style.<?= $item ?>.smoking.did_smoke)">
            <span class="black--text font-weight-bold">Año de abandono:
                {{ getOnlyYear(comparison.life_style.<?= $item ?>.smoking.quit_year) }} </span>
        </v-col>
    </v-row>
</v-col>