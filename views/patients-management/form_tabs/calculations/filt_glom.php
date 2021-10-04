
        <template v-if="patient_laboratory_exams.selectedExam.name == 'Tasa Filt Glom'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula para determinar tasa de filtración glomerular</h2>
            </v-col>

          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="6">
                <label>Raza</label>
                <v-radio-group v-model="patient_laboratory_exams.formulas.filt_glom.vars.race" row>
                  <v-radio label="Blanco u otro" value="1"></v-radio>
                  <v-radio label="Negro" value="1.159"></v-radio>
                </v-radio-group>
              </v-col>
              <v-col cols="12" md="6">
                <label>Creatinina sérica</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.filt_glom.vars.serum_creatinine" :counter="7" suffix="mg/dL" outlined required></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" @click="gfrCkdEpiFx();$refs.pl_result_input.scrollIntoView({ behavior: 'smooth' })">
                  Calcular
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </template>
