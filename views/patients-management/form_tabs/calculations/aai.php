<v-col cols="12" class="pt-8">
    <v-form ref="aai_form">
        <v-row class="px-6">
            <v-col cols="12" md="6">
                <v-row>
                    <v-col cols="12">
                        <h4 class="text-h6 black--text">Lado izquierdo</h4>
                    </v-col>
                    <v-col cols="12">
                        <label>Tibial posterior</label>
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.vars.tpi"
                            @input="calcAAI" outlined></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <label>Pedia</label>
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.vars.pi"
                            @input="calcAAI" outlined></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <label>Humeral</label>
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.vars.hi"
                            @input="calcAAI" outlined></v-text-field>
                    </v-col>

                    <v-col class="mt-10" cols="12">
                        <h4 class="text-6">ITB Izquierdo</h4>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.itbi"
                            readonly outlined></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-textarea class="mt-3" v-model="patient_physical_exam.content.calc.aai.itbi_result" readonly
                            outlined></v-textarea>
                    </v-col>
                </v-row>
            </v-col>

            <v-col cols="12" md="6">
                <v-row>
                    <v-col cols="12">
                        <h4 class="text-h6 black--text">Lado derecho</h4>
                    </v-col>
                    <v-col cols="12">
                        <label>Tibial posterior</label>
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.vars.tpd"
                            @input="calcAAI" outlined></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <label>Pedia</label>
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.vars.pd"
                            @input="calcAAI" outlined></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <label>Humeral</label>
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.vars.hd"
                            @input="calcAAI" outlined></v-text-field>
                    </v-col>

                    <v-col class="mt-10" cols="12">
                        <h4 class="text-6">ITB Derecho</h4>
                    </v-col>

                    <v-col cols="12">
                        <v-text-field type="number" class="mt-3" v-model="patient_physical_exam.content.calc.aai.itbd"
                            readonly outlined></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-textarea class="mt-3" v-model="patient_physical_exam.content.calc.aai.itbd_result" readonly
                            outlined></v-textarea>
                    </v-col>
                </v-row>
            </v-col>
            <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text"
                    @click="patient_physical_exam.aai_dialog = false">
                    Guardar
                </v-btn>
            </v-col>

        </v-row>
    </v-form>
</v-col>