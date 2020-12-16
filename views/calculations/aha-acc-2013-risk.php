    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Calculadora de Riesgo 2013 AHA / ACC</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" :items="patients" item-text="name" item-value="id" outlined ></v-select>
              </v-col>               


              <v-col cols="12" md="4">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="calc.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4">
                <label>Género</label>
                <v-select class="mt-3" v-model="calc.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="4">
                <label>Raza</label>
                <v-select class="mt-3" v-model="calc.race" outlined ></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>Colesterol total</label>
                <v-text-field class="mt-3" v-model="calc.total_cholesterol" hint="El valor debe estar entre 130 - 320" outlined required ></v-text-field>
              </v-col>       

              <v-col cols="12" md="6">
                <label>Seleccione una opción</label>
                <v-select class="mt-3" outlined ></v-select>
              </v-col>                   

              <v-col cols="12" md="6">
                <label>Colesterol HDL</label>
                <v-text-field class="mt-3" v-model="calc.hdl_cholesterol" hint="El valor debe estar entre 20 - 100" outlined required ></v-text-field>
              </v-col>  

              <v-col cols="12" md="6">
                <label>Seleccione una opción</label>
                <v-select class="mt-3" outlined ></v-select>
              </v-col>  

              <v-col cols="12" md="6">
                <label>Tensión Arterial Sistólica</label>
                <v-text-field class="mt-3" v-model="calc.tas" hint="El valor debe estar entre 90 - 200" outlined required ></v-text-field>
              </v-col>  

              <v-col cols="12" md="6">
                <label>Seleccione una opción</label>
                <v-select class="mt-3" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="4">
                <label>En tratamiento para Hipertensión</label>
                <v-select class="mt-3" v-model="calc.hipertension_treatment" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4">
                <label>Diabetes</label>
                <v-select class="mt-3" v-model="calc.diabetes" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4">
                <label>Fumador</label>
                <v-select class="mt-3" v-model="calc.smoking" outlined required></v-select>
              </v-col>

              <v-col cols="12">
                <v-btn class="white--text secondary" block rounded>Calcular Riesgo Cardiovascular</v-btn>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center result-label">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
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