<v-col cols="12" class="pt-8">
    <v-form>
        <v-row class="px-6">

            <v-col cols="12" md="6">
                <label>QT</label>
                <v-text-field class="mt-3" v-model="patient_electro_cardiogram.content.qt" suffix="mseg"
                    @keyup="calcQTC" outlined></v-text-field>
            </v-col>

            <v-col cols="12" md="6">
                <label>Frecuencia Cardiaca</label>
                <v-text-field class="mt-3" v-model="patient_electro_cardiogram.content.fc" suffix="QRS/min"
                    @keyup="calcQTC" outlined></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-row justify="center">
                    <v-col cols="12" md="6">
                        <label>Escoger resultado</label>
                        <v-select class="mt-3" v-model="patient_electro_cardiogram.content.qtc_formula_selected"
                        :items="patient_electro_cardiogram.options.qtc_list" return-object outlined></v-select>
                    </v-col>
                </v-row>
            </v-col>
            <v-col cols="8" offset-md="2">
                <v-row v-if="patient_electro_cardiogram.content.qt != '' && patient_electro_cardiogram.content.fc">
                    <v-col cols="12">
                        <h5 class="text-center text-h5">Resultados</h5>
                    </v-col>
                    <v-col cols="4"><b>RR:</b> {{ patient_electro_cardiogram.content.rr }} seg</v-col>
                    <v-col cols="4"><b>QTc (Rautaharju):</b> {{ patient_electro_cardiogram.content.qtrau }} mseg</v-col>
                    <v-col cols="4"><b>QTc (Bazett):</b> {{ patient_electro_cardiogram.content.qtbaz }} mseg</v-col>
                    <v-col cols="4"><b>QTc (Framingham):</b> {{ patient_electro_cardiogram.content.qtfra }} mseg</v-col>
                    <v-col cols="4"><b>QTc (Friderica):</b> {{ patient_electro_cardiogram.content.qtfri }} mseg</v-col>
                    <v-col cols="4"><b>QTC (Call):</b> {{ patient_electro_cardiogram.content.qtcal }} mseg</v-col>
                </v-row>
            </v-col>
            <v-col class="d-flex justify-center mt-n5" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text"
                    @click="calcQTC(); patient_electro_cardiogram.content.qtc = patient_electro_cardiogram.content.qt; patient_electro_cardiogram.form_dialog = false">
                    Guardar
                </v-btn>
            </v-col>

        </v-row>
    </v-form>
</v-col>