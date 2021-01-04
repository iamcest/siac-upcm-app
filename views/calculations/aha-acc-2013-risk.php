    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <?php echo new Template('parts/upcm_logo') ?>
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Calculadora de Riesgo 2013 AHA / ACC</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" v-model="patient" :items="patients" item-text="full_name" @change="assignGeneralVars" return-object outlined></v-select>
              </v-col>               


              <v-col cols="12" md="4">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4">
                <label>Género</label>
                <v-select class="mt-3" v-model="vars.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="4">
                <label>Raza</label>
                <v-select class="mt-3" v-model="vars.race" :items="race" item-text="text" item-value="val" outlined></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>Colesterol total</label>
                <v-text-field class="mt-3" v-model="vars.total_cholesterol" hint="El valor debe estar entre 130 - 320" suffix="mg/dl" outlined required></v-text-field>
              </v-col>                       

              <v-col cols="12" md="6">
                <label>Colesterol HDL</label>
                <v-text-field class="mt-3" v-model="vars.hdl_cholesterol" hint="El valor debe estar entre 20 - 100" suffix="mg/dl" outlined required></v-text-field>
              </v-col> 

              <v-col cols="12" md="6">
                <label>Colesterol LDL</label>
                <v-text-field class="mt-3" v-model="vars.ldl_cholesterol" hint="El valor debe estar entre 30 - 300" suffix="mg/dl" outlined required></v-text-field>
              </v-col>  
              <v-col cols="12" md="6"></v-col>
              <v-col cols="12" md="6">
                <label>Presión Arterial Sistólica</label>
                <v-text-field class="mt-3" v-model="vars.pas" hint="El valor debe estar entre 90 - 200" suffix="mmHg" outlined required></v-text-field>
              </v-col>  

              <v-col cols="12" md="6">
                <label>Presión Arterial Distólica</label>
                <v-text-field class="mt-3" v-model="vars.pad" hint="El valor debe estar entre 60 - 130" suffix="mmHg" outlined required></v-text-field>
              </v-col>  


              <v-col cols="12" md="6">
                <label>En tratamiento para Hipertensión</label>
                <v-select class="mt-3" v-model="vars.hipertension_treatment" :items="true_false" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Diabetes</label>
                <v-select class="mt-3" v-model="vars.diabetes" :items="true_false" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Fumador</label>
                <v-select class="mt-3" v-model="vars.smoking" :items="true_false" item-text="text" item-value="val" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="calc" outlined readonly required ></v-text-field>
              </v-col>  

              <v-col cols="12">
                <v-divider></v-divider>
                <v-simple-table >
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left">
                          índice de Riesgo
                        </th>
                        <th class="text-left">
                          Valoración en %
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="item in table"
                        :key="item.name"
                      >
                        <td>{{ item.risk }}</td>
                        <td>{{ item.valuation }}</td>
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
              </v-col>

            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>