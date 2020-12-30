
        <v-col cols="12" class="pt-8" v-if="patient_risk_factors.selectedForm.calc_name == 'FINDRISK'">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmulario de FINDRISK</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-6"> 

              <v-col cols="12" md="6">
                <label>Edad (años cumplidos)</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>índice de Masa corporal(kg/m2)</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.bmi" hint="Ingrese la unidad en kg/m2" suffix="kg/m2" persistent-hint outlined required ></v-text-field>
              </v-col>    

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.gender" :items="patient_risk_factors.selectedForm.findrisk_vars.genders" item-text="gender" item-value="abbr" :value="editedItem.gender" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="6">
                <label>Perímetro de la cintura</label>
                <v-text-field class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.perimeter" hint="Ingrese la unidad en cm" suffix="cm" persistent-hint outlined required ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿El paciente realiza habitualmente (a diario) al menos 30 miuntos de actividad física en el trabajo y/o tiempo libre?</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.workout" :items="patient_risk_factors.selectedForm.findrisk_vars.workout" item-text="text" item-value="val" outlined required></v-select>
              </v-col>  

              <v-col cols="12" md="6">
                <label>¿Con qué frecuencia el paciente consume verduras o frutas? <br><br></label>
                <v-select class="mt-n3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.healthy_food" :items="patient_risk_factors.selectedForm.findrisk_vars.healthy_food" item-text="text" item-value="val" outlined required></v-select>
              </v-col>    
                           
              <v-col cols="12" md="6">
                <label>¿Al paciente le han encontrado alguna vez valores de glucosa altos? Por ejemplo, en un control médico, durante una enfermedad, durante el embarazo</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.high_glucose" :items="patient_risk_factors.selectedForm.findrisk_vars.high_glucose" item-text="text" item-value="val" outlined required></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>¿Se le ha diagnosticado diabetes (tipo 1 o 2) a alguno de sus familiares? Nota: la diabetes por edad o ya de viejo también cuenta</label>
                <v-select class="mt-3" v-model="patient_risk_factors.selectedForm.findrisk_vars.vars.family_diabete" :items="patient_risk_factors.selectedForm.findrisk_vars.family_diabete" item-text="text" item-value="val" outlined required></v-select>
              </v-col>       

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col>  
              <v-col cols="12">
                <p class="text-center">El puntuaje máximo es de 26 puntos. Si la puntuación es >= 12, hay una alta probabilidad de tener diabetes mellitus de tipo 2 u otra anormalidad de la reguliacíón glucosa.</p>
              </v-col>
            </v-row>
          </v-form>
        </v-col>