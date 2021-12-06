<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row>
            <?php echo new Template('parts/sidebar', $data) ?>
            <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('parts/upcm_logo') ?>
                <v-row>
                    <v-col cols="12" md="12">
                        <h2 class="text-center">Fórmula para determinar tasa de filtración glomerular</h2>
                    </v-col>
                </v-row>
                <v-form>
                    <v-row class="px-6">
                        
                        <v-col cols="12" md="12">
                            <label>Paciente</label>
                            <v-select class="mt-3" v-model="patient" :items="patients" item-text="full_name"
                                @change="assignGeneralVars" return-object outlined></v-select>
                        </v-col>

                        <v-col cols="12" md="6">
                            <label>Edad</label>
                            <v-text-field type="number" class="mt-3" v-model="vars.age" outlined required></v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <label>Género</label>
                            <v-select class="mt-3" v-model="vars.gender" :items="genders" item-text="gender"
                                item-value="abbr" outlined required></v-select>
                        </v-col>

                        <v-col cols="12" md="6">
                            <label>Raza</label>
                            <v-radio-group v-model="vars.race_selected" @change="assignGFRVars(vars.metodology)" row>
                                <v-radio label="Blanco u otro" value="1"></v-radio>
                                <v-radio label="Negro" value="1.21"></v-radio>
                            </v-radio-group>
                        </v-col>

                        <v-col cols="12" md="6">
                            <label>Creatinina sérica</label>
                            <v-text-field class="mt-3" v-model="vars.serum_creatinine"
                                @keydown="assignGFRVars(vars.metodology)" :counter="7" suffix="mg/dL" outlined required>
                            </v-text-field>
                        </v-col>

                        <v-col cols="12" md="6">
                            <label>Metodología</label>
                            <v-select class="mt-3" :items="['CKD-EPI', 'MDRD (IDMS)']" v-model="vars.metodology"
                                @change="assignGFRVars(vars.metodology)" outlined required></v-select>
                        </v-col>

                        <v-col cols="12" md="4" offset-md="4">
                            <label class="text-center d-flex justify-center">Resultado</label>
                            <v-text-field class="mt-3 result-box" :value="calc" outlined readonly required>
                            </v-text-field>
                        </v-col>

                    </v-row>
                </v-form>
            </v-col>
        </v-row>
    </v-container>
</v-main>