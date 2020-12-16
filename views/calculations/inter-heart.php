    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Calculadora de Riesgo Inter Heart</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" :items="patients" item-text="name" item-value="id" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>               

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Región de Origen</p>
                <v-select class="mt-3" v-model="calc.region" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Edad</p>
                <v-text-field class="mt-3" v-model="calc.age" :counter="3" outlined required ></v-text-field>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Tabaquismo</p>
                <label>¿El paciente nunca fumó?</label>
                <v-select class="mt-3" v-model="calc.smoking" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Fumador pasivo</p>
                <label>Exposición al humo del tabaco en el último año</label>
                <v-select class="mt-3" v-model="calc.smoking_exposition" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Diabetes</p>
                <label>¿El paciente tiene diabetes?</label>
                <v-select class="mt-3" v-model="calc.diabetes" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Hipertensión Arterial</p>
                <label>¿El paciente tiene hipertensión?</label>
                <v-select class="mt-3" v-model="calc.hipertension" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Historia Familiar</p>
                <label>¿El paciente tiene uno o ambos padres biológicos con antecedentes de infarto?</label>
                <v-select class="mt-3" v-model="calc.parents_ha_history" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">índice de cintura de cadera</p>
                <label>índice de cintura de cadera</label>
                <v-select class="mt-3" v-model="calc.waist_index" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Factores Psicosociales</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label>¿Con cuanta frecuencia el paciente sintió estres laboral o en el hogar durante el último año?</label>
                    <v-select class="mt-3" v-model="calc.stress_frecuency" outlined ></v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <label>¿Cuan activo es el paciente durante su tiempo libre?<br><br></label>
                    <v-select class="mt-3" v-model="calc.free_time_activity" outlined ></v-select>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Factores Dietético</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label>¿El paciente consume comida con sal o snacks 1 o 2 veces al día?<br><br></label>
                    <v-select class="mt-3" v-model="calc.salt_snack_food_daily" outlined ></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume comida frita, snacks o comida rápida 3 o más veces a la semana?</label>
                    <v-select class="mt-3" v-model="calc.fast_food_weekly" outlined ></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume 1 fruta o más veces al día?</label>
                    <v-select class="mt-3" v-model="calc.eat_fruits" outlined ></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume vegetales 1 o más veces al día?</label>
                    <v-select class="mt-3" v-model="calc.eat_vegetables" outlined ></v-select>
                  </v-col>

                  <v-col cols="12">
                    <label>¿El paciente consume carne o aves 2 o más veces al día?</label>
                    <v-select class="mt-3" v-model="calc.eat_meat" outlined ></v-select>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12">
                <v-btn class="white--text secondary" block rounded>Calcular Riesgo Inter Heart</v-btn>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center result-label">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col> 

              <v-col cols="12">
                <v-divider></v-divider>
                <v-row>
                  <v-col class="pr-2" cols="12" md="6">
                    <h3 class="grey--text darken-2 text-center">SCORE Europeo</h3>
                    <v-simple-table >
                      <template v-slot:default>
                        <thead>
                          <tr>
                            <th class="text-left">
                              Región
                            </th>
                            <th class="text-left">
                              Factor Multiplicador
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="item in european_score"
                            :key="item.region"
                          >
                            <td>{{ item.region }}</td>
                            <td>{{ item.factor }}</td>
                          </tr>
                        </tbody>
                      </template>
                    </v-simple-table>
                  </v-col>
                  <v-col class="pl-2" cols="12" md="6">
                    <h3 class="grey--text darken-2 text-center">Valoración según el resultado</h3>
                    <v-simple-table >
                      <template v-slot:default>
                        <thead>
                          <tr>
                            <th class="text-left">
                              Valoración
                            </th>
                            <th class="text-left">
                              Puntuaje
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="item in table"
                            :key="item.valuation"
                          >
                            <td>{{ item.valuation }}</td>
                            <td>{{ item.points }}</td>
                          </tr>
                        </tbody>
                      </template>
                    </v-simple-table>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>