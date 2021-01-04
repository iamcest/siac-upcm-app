
        <v-col cols="12" class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'Colesterol LDL'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula para determinar el colesterol LDL</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="4">
                <label>Colesterol total</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.total_cholesterol" :counter="7" suffix="mg/dl" outlined required></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>c-No HDL</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.c_HDL" :counter="7" suffix="mg/dl" outlined required></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>Nivel de Triglicéridos</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.triglyceride_level" :counter="7" suffix="mg/dl" outlined required></v-text-field>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="patient_risk_factors.selectedForm.obj.results" outlined readonly required ></v-text-field>
              </v-col>

              <v-col class="d-flex justify-center mt-n10" cols="12" md="4" offset-md="4">
                <v-btn class="secondary white--text" v-on:click="patient_risk_factors.selectedForm.obj.calc()">
                  Calcular
                </v-btn>
              </v-col>

            </v-row>
          </v-form>
        </v-col>