
        <template v-if="patient_laboratory_exams.selectedExam.name == 'Creatinina'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Estimación del filtrado glomerular MDR / CKD-EPI</h2>
            </v-col>

          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="4">
                <label>Raza</label>
                <v-radio-group v-model="patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.race" @change="assignGFRVars(patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.metodology)" row>
                  <v-radio label="Blanco u otro" value="1"></v-radio>
                  <v-radio label="Negro" value="1.21"></v-radio>
                </v-radio-group>
              </v-col>

              <v-col cols="12" md="4">
                <label>Creatinina sérica</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.serum_creatinine" @keydown="assignGFRVars(patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.metodology)" :counter="7" suffix="mg/dL" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="4">
                <label>Metodología</label>
                <v-select class="mt-3" :items="['CKD-EPI', 'MDRD (IDMS)']" v-model="patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.metodology" @change="assignGFRVars(patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.metodology)" outlined required></v-select>
              </v-col>

              <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" @click="patient_laboratory_exams.formulas.egfr_mdr_ckdepi.vars.metodology == 'MDRD (IDMS)' ? gfrCkdEpiFx() : gfrRrmdFx()">
                  Calcular
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </template>
