
        <v-col cols="12" class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'Riesgo 2013 AHA/ACC'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Calculadora de Riesgo 2013 AHA / ACC</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="4">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4">
                <label>Género</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.gender" :items="genders" item-text="name" item-value="gender" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="4">
                <label>Raza</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.race" :items="patient_risk_factors.selectedForm.obj.race" item-text="text" item-value="val" outlined></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>Colesterol total</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.total_cholesterol" hint="El valor debe estar entre 130 - 320" suffix="mg/dl" outlined required></v-text-field>
              </v-col>                       

              <v-col cols="12" md="6">
                <label>Colesterol HDL</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.hdl_cholesterol" hint="El valor debe estar entre 20 - 100" suffix="mg/dl" outlined required></v-text-field>
              </v-col> 

              <v-col cols="12" md="6">
                <label>Colesterol LDL</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.ldl_cholesterol" hint="El valor debe estar entre 30 - 300" suffix="mg/dl" outlined required></v-text-field>
              </v-col>  
              <v-col cols="12" md="6"></v-col>
              <v-col cols="12" md="6">
                <label>Presión Arterial Sistólica</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.pas" hint="El valor debe estar entre 90 - 200" suffix="mmHg" outlined required></v-text-field>
              </v-col>  

              <v-col cols="12" md="6">
                <label>Presión Arterial Distólica</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.pad" hint="El valor debe estar entre 60 - 130" suffix="mmHg" outlined required></v-text-field>
              </v-col>  


              <v-col cols="12" md="6">
                <label>En tratamiento para Hipertensión</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.hipertension_treatment" :items="patient_risk_factors.selectedForm.obj.true_false" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Diabetes</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.diabetes" :items="patient_risk_factors.selectedForm.obj.true_false" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Fumador</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.smoking" :items="patient_risk_factors.selectedForm.obj.true_false" item-text="text" item-value="val" outlined required></v-select>
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