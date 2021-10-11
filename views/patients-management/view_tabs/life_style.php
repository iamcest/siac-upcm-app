<v-row class="full-width">
    <?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update'])): ?>
    <v-col class="d-flex justify-end" cols="12">
        <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-11'"
            dark>Editar</v-btn>
    </v-col>
    <?php endif ?>
    <v-col cols="12">
        <v-row>
            <v-col cols="12" md="6" lg="4">
                <span class="font-weight-bold">Ejercicio físico:
                    <span class="black--text">
                        <template v-if="patient_life_style.editedItem.physical_exercise">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </span>
            </v-col>
            <template v-if="patient_life_style.editedItem.physical_exercise">
                <v-col cols="12" md="6" lg="4">
                    <span class="font-weight-bold">Minutos a la semana:
                        <span class="black--text">
                            {{ patient_life_style.editedItem.exercise_weekly_minutes }}
                        </span>
                    </span>
                </v-col>
                <v-col cols="12" md="6" lg="4">
                    <span class="font-weight-bold">Tipo de ejercicio:
                        <span class="black--text">
                            {{ patient_life_style.editedItem.exercise.type }}
                        </span>
                    </span>
                </v-col>
                <v-col cols="12" md="6" lg="4" v-if="patient_life_style.editedItem.exercise.exercises.length > 0">
                    <span class="font-weight-bold">Ejercicios:
                        <br>
                        <template v-for="exercise in patient_life_style.editedItem.exercise.exercises">
                            <span class="black--text">
                                - {{ exercise }} <br>
                            </span>
                        </template>
                    </span>
                </v-col>
            </template>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
    <v-col cols="12">
        <v-row>
            <v-col cols="12" md="6" lg="4">
                <span class="font-weight-bold">Ejercicio físico:
                    <span class="black--text">
                        <template v-if="patient_life_style.editedItem.alcohol_consumption">
                            Sí
                        </template>
                        <template v-else>
                            No
                        </template>
                    </span>
                </span>
            </v-col>
            <v-col cols="12" md="6" lg="4" v-if="parseInt(patient_life_style.editedItem.alcohol_consumption)">
                <span class="font-weight-bold">Minutos a la semana:
                    <span class="black--text">
                        {{ patient_life_style.editedItem.alcohol_daily_consumption }}
                    </span>
                </span>
            </v-col>
        </v-row>
    </v-col>
    <v-col cols="12">
        <v-divider></v-divider>
    </v-col>
    <?php echo new Template('patients-management/view_tabs/life_style/smoking') ?>
</v-row>