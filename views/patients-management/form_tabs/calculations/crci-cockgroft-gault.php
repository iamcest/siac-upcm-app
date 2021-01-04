
        <v-col cols="12" class="pt-9" v-if="patient_risk_factors.selectedForm.calc_name == 'CrCI Cockgroft/Gault'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula CrCI Cockroft - Gault</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-6">

              <v-col cols="12" md="6">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.gender" :items="genders" item-text="name" item-value="gender" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Peso</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.weight" :counter="7" suffix="kg" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Suero de creatinina</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.obj.vars.creatinine_serum" :counter="7" outlined required ></v-text-field>
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