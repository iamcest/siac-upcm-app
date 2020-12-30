
        <v-col cols="12"class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'Riesgo OMS/OPS'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Calculadora de Riesgo OMS / OPS</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" :items="patient_risk_factors.selectedForm.oms_ops_vars.patients" item-text="name" item-value="id" outlined ></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.oms_ops_vars.vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.oms_ops_vars.vars.gender" :items="patient_risk_factors.selectedForm.oms_ops_vars.genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="6">
                <label>Tabaquismo</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.oms_ops_vars.vars.smoking" :items="patient_risk_factors.selectedForm.oms_ops_vars.true_false" item-text="text" item-value="val" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Presión máxima (sistólica)</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.oms_ops_vars.vars.max_pressure" :items="patient_risk_factors.selectedForm.oms_ops_vars.mp" item-text="text" item-value="val" suffix="mmHg" outlined ></v-select>
              </v-col>              

              <v-col cols="12" md="6">
                <label>Diabetes</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.oms_ops_vars.vars.diabete" :items="patient_risk_factors.selectedForm.oms_ops_vars.true_false" item-text="text" item-value="val" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Colesterol total (md/dl)</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.oms_ops_vars.vars.total_cholesterol" :items="patient_risk_factors.selectedForm.oms_ops_vars.cholesterol" item-text="text" item-value="patient_risk_factors.selectedForm.oms_ops_vars.val" suffix="md/dl" outlined ></v-select>
              </v-col>

              <v-col cols="12">
                <v-btn class="white--text secondary" block rounded>Calcular Riesgo Cardiovascular</v-btn>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col>  

            </v-row>
          </v-form>
        </v-col>