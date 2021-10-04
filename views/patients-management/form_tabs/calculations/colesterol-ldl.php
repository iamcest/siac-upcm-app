
        <template v-if="patient_laboratory_exams.selectedExam.name == 'Colesterol LDL'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula para determinar el colesterol LDL</h2>
            </v-col>

          </v-row>
          <v-form ref="ple_formulas_cholesterol_ldl" v-model="patient_laboratory_exams.formulas.cholesterol_ldl.form_valid" lazy-validation>
            <v-row class="px-6">

              <v-col cols="12" md="4">
                <label>Colesterol total</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.cholesterol_ldl.vars.total_cholesterol" :counter="7" suffix="mg/dL" :rules="patient_laboratory_exams.formulas.cholesterol_ldl.rules.required" outlined required></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>c-HDL</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.cholesterol_ldl.vars.c_HDL" :counter="7" suffix="mg/dL" :rules="patient_laboratory_exams.formulas.cholesterol_ldl.rules.required"  outlined required></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>Nivel de Triglicéridos</label>
                <v-text-field class="mt-3" v-model="patient_laboratory_exams.formulas.cholesterol_ldl.vars.triglyceride_level" :counter="7" suffix="mg/dL" :rules="patient_laboratory_exams.formulas.cholesterol_ldl.rules.required"  outlined required></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center mt-n7" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" @click="calcCholesterolLDL(); $refs.pl_result_input.scrollIntoView({ behavior: 'smooth' })" :disabled="!patient_laboratory_exams.formulas.cholesterol_ldl.form_valid">
                  Calcular
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </template>
