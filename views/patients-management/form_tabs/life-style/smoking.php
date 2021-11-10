<v-col cols="12">
    <v-row class="d-flex justify-start">
        <v-col cols="6" md="4" lg="3">
            <v-select v-model="patient_life_style.editedItem.smoking.active" :items="patient_life_style.options.select" outlined dense>
                <template #prepend>
                    <h4 class="my-auto text-h6 font-weight-bold">Tabaquismo:</h4>
                </template>
            </v-select>
        </v-col>
    </v-row>
    <v-row class="factor-risk-container mb-10" v-if="parseInt(patient_life_style.editedItem.smoking.active)">
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <label class="black--text font-weight-bold">Año de inicio aproximado:</label>
                    <v-dialog ref="smoking_start_year_modal" v-model="smoking_start_year_modal"
                        width="290px">
                        <template #activator="{ on, attrs }">
                            <v-text-field class="mt-3"
                                :value="getOnlyYear(patient_life_style.editedItem.smoking.start_year)"
                                append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined dense>
                            </v-text-field>
                        </template>
                        <v-date-picker ref="smoking_start_year_datepicker"
                            v-model="patient_life_style.editedItem.smoking.start_year"
                            @input="$refs.smoking_start_year_modal.save(patient_life_style.editedItem.smoking.start_year)"
                            locale="es" reactive no-title scrollable>
                        </v-date-picker>
                    </v-dialog>
                </v-col>
                <v-col cols="12" v-if="!parseInt(patient_life_style.editedItem.smoking.active) 
                || parseInt(patient_life_style.editedItem.smoking.active) && parseInt(patient_life_style.editedItem.smoking.no_smoking_frecuency)">
                    <label class="black--text font-weight-bold">Año de abandono:</label>
                    <v-dialog ref="smoking_quit_year_modal" v-model="smoking_quit_year_modal"
                        width="290px">
                        <template #activator="{ on, attrs }">
                            <v-text-field class="mt-3"
                                :value="getOnlyYear(patient_life_style.editedItem.smoking.quit_year)"
                                append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined dense>
                            </v-text-field>
                        </template>
                        <v-date-picker ref="smoking_quit_year_datepicker"
                            v-model="patient_life_style.editedItem.smoking.quit_year"
                            @input="$refs.smoking_quit_year_modal.save(patient_life_style.editedItem.smoking.quit_year)"
                            locale="es" reactive no-title scrollable>
                        </v-date-picker>
                    </v-dialog>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <label class="black--text font-weight-bold">Número de cigarros al día</label>
                    <v-text-field v-model="patient_life_style.editedItem.smoking.cigarettes_per_day" class="mt-3"
                        outlined dense>
                    </v-text-field>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <label class="black--text font-weight-bold">Test de Fagerström</label>
                    <v-text-field v-model="patient_life_style.editedItem.smoking.fagerstrom_test" class="mt-3"
                        :hint="getFagerStromScoreDescription(false)" persistent-hint outlined dense>
                        <template #append>
                            <v-btn class="mr-n3" color="primary" style="margin-top: -6.3px"
                                @click="patient_life_style.calc.fagerstrom.form_dialog = true" dark>
                                TEST
                            </v-btn>
                        </template>
                    </v-text-field>
                    <v-dialog v-model="patient_life_style.calc.fagerstrom.form_dialog">
                        <v-card>
                            <v-toolbar elevation="0">
                                <v-toolbar-title>Test de Fagerström</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn icon dark @click="patient_life_style.calc.fagerstrom.form_dialog = false">
                                        <v-icon color="grey">mdi-close</v-icon>
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>

                            <v-divider></v-divider>

                            <v-card-text>
                                <v-container fluid>
                                    <?php echo new Template('patients-management/form_tabs/calculations/fagerstrom'); ?>
                                </v-container>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <label class="black--text font-weight-bold">¿Ha dejado de fumar alguna vez?</label>
                    <v-select class="mt-3" v-model="patient_life_style.editedItem.smoking.no_smoking_frecuency"
                        :items="patient_life_style.options.select" outlined dense></v-select>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <label class="black--text font-weight-bold">¿Desea dejar de fumar?</label>
                    <v-select class="mt-3" v-model="patient_life_style.editedItem.smoking.smoking_wish"
                        :items="patient_life_style.options.select" outlined dense></v-select>
                </v-col>
                <template v-if="patient_life_style.editedItem.smoking.no_smoking_frecuency">
                    <v-col cols="12">
                        <label class="black--text font-weight-bold">Hace cuánto tiempo</label>
                        <v-text-field class="mt-3" v-model="patient_life_style.editedItem.smoking.last_time" outlined
                            dense>
                        </v-text-field>
                    </v-col>
                    <v-col cols="12" class="mt-n4">
                        <label class="black--text font-weight-bold">Cuántas veces</label>
                        <v-text-field type="number" class="mt-3"
                            v-model="patient_life_style.editedItem.smoking.how_many_times" outlined dense>
                        </v-text-field>
                    </v-col>
                </template>
            </v-row>
        </v-col>
        <v-col cols="6" md="4" lg="2">
            <v-row>
                <v-col cols="12">
                    <label class="black--text font-weight-bold">Breve consejería</label>
                    <v-select class="mt-3" v-model="patient_life_style.editedItem.smoking.short_advice.done"
                        :items="patient_life_style.options.select" outlined dense></v-select>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row class="factor-risk-container mb-10" v-if="!parseInt(patient_life_style.editedItem.smoking.active)">
        <v-col cols="6" md="4" lg="2">
            <label class="black--text font-weight-bold">¿Fumó alguna vez?</label>
            <v-select class="mt-3" v-model="patient_life_style.editedItem.smoking.did_smoke"
                :items="patient_life_style.options.select" outlined dense></v-select>
        </v-col>
        <v-col cols="6" md="4" lg="2" v-if="parseInt(patient_life_style.editedItem.smoking.did_smoke)">
            <label class="black--text font-weight-bold">Año de abandono:</label>
            <v-dialog ref="smoking_quit_year_modal" v-model="smoking_quit_year_modal" width="290px">
                <template #activator="{ on, attrs }">
                    <v-text-field class="mt-3" :value="getOnlyYear(patient_life_style.editedItem.smoking.quit_year)"
                        append-icon="mdi-calendar" readonly v-bind="attrs" v-on="on" outlined dense>
                    </v-text-field>
                </template>
                <v-date-picker ref="smoking_quit_year_datepicker"
                    v-model="patient_life_style.editedItem.smoking.quit_year"
                    @input="$refs.smoking_quit_year_modal.save(patient_life_style.editedItem.smoking.quit_year)"
                    locale="es" reactive no-title scrollable>
                </v-date-picker>
            </v-dialog>
        </v-col>
    </v-row>
</v-col>