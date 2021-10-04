
        <template v-if="patient_laboratory_exams.selectedExam.name == 'Colesterol No HDL'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula para determinar el colesterol no HDL</h2>
            </v-col>

          </v-row>
          <v-form>
            <v-row class="px-6 d-flex justify-center">
              <v-col cols="12" md="4">
                <label>Colesterol total</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.cholesterol_no_hdl.vars.total_cholesterol" :counter="7" suffix="mg/dL" outlined required></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>c-No HDL</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.cholesterol_no_hdl.vars.c_HDL" :counter="7" suffix="mg/dL" outlined required></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center" cols="12">
                <v-btn class="secondary white--text" @click="calcCholesterolNoHDL();$refs.pl_result_input.scrollIntoView({ behavior: 'smooth' })">
                  Calcular
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </template>
