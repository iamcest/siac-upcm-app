<v-row>
    <v-col cols="12" md="6" lg="4" xl="3" v-for="(family, i) in patient_history.form.history_content.family_history"
        :key="i">
        <v-row class="py-0">
            <v-col class="py-0 px-0 d-flex justify-end" cols="12">
                <v-btn color="error" @click="patient_history.form.history_content.family_history.splice(i, 1)" icon
                    text>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-col>
        </v-row>
        <label class="font-weight-bold black--text">Parentesco</label>
        <v-select v-model="patient_history.form.history_content.family_history[i].relationship"
            :items="patient_history.options.family" outlined>
        </v-select>
        
        <label class="font-weight-bold black--text">Edad</label>
        <v-text-field type="number" v-model="patient_history.form.history_content.family_history[i].age" outlined>
        </v-text-field>

        <label class="font-weight-bold black--text">Seleccionar enfermedades</label>
        <v-select ref="family_disease_select" v-model="patient_history.form.history_content.family_history[i].diseases"
            :items="patient_history.options.diseases" multiple outlined>
            <template #prepend-item>
                <v-row class="px-7">
                    <v-btn color="secondary" @click="$refs.family_disease_select[i].blur()" block>Cerrar
                    </v-btn>
                </v-row>
            </template>
        </v-select>

        <label class="font-weight-bold black--text">Otras enfermedades</label>
        <v-textarea v-model="patient_history.form.history_content.family_history[i].other_diseases" outlined>
        </v-textarea>

    </v-col>
    <v-col cols="12" md="6" lg="4" xl="3" v-if="patient_history.form.history_content.family_history.length < 4">
        <v-btn color="primary" @click="
            patient_history.form.history_content.family_history.push(
                {
                    relationship: 'Padre',
                    diseases: [],
                    other_diseases: '',
                }
            )
        " block>
            <v-icon>mdi-plus</v-icon>
            Añadir familiar
        </v-btn>
    </v-col>
</v-row>