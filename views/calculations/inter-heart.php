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
                <v-select class="mt-3" v-model="vars.region" :items="european_score" item-text="region" item-value="factor" outlined ></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Información general</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label for="">Edad</label>
                    <v-text-field class="mt-3" v-model="vars.age" :counter="3" outlined required ></v-text-field>
                  </v-col>
                  <v-col cols="12" md="6">
                    <label for="">Género</label>
                    <v-select class="mt-3" v-model="vars.gender" :items="genders" item-text="gender" item-value="abbr" outlined ></v-select>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Tabaquismo</p>
                <label>¿El paciente nunca fumó?</label>
                <v-select class="mt-3" v-model="vars.smoking" :items="smoking_options" item-text="text" item-value="val" outlined ></v-select>
                <template v-if="vars.smoking == 'Fumador actual'">
                  <label>Cigarros al día</label>
                  <v-select class="mt-3" v-model="vars.smoking_amount" :items="smoking_amount" item-text="text" item-value="val" outlined></v-select>
                </template>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Fumador pasivo</p>
                <label>Exposición al humo del tabaco en el último año</label>
                <v-select class="mt-3" v-model="vars.smoking_exposition" :items="smoking_exposition" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Diabetes</p>
                <label>¿El paciente tiene diabetes?</label>
                <v-select class="mt-3" v-model="vars.diabetes" :items="diabete" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Hipertensión Arterial</p>
                <label>¿El paciente tiene hipertensión?</label>
                <v-select class="mt-3" v-model="vars.hipertension" :items="hipertension" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Historia Familiar</p>
                <label>¿El paciente tiene uno o ambos padres biológicos con antecedentes de infarto?</label>
                <v-select class="mt-3" v-model="vars.parents_ha_history" :items="parents_ha_history" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">índice de cintura de cadera</p>
                <label>índice de cintura de cadera</label>
                <v-select class="mt-3" v-model="vars.waist_index" :items="waist_index" item-text="text" item-value="val" outlined></v-select>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Factores Psicosociales</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label>¿Con cuanta frecuencia el paciente sintió estres laboral o en el hogar durante el último año?</label>
                    <v-select class="mt-3" v-model="vars.stress_frecuency" :items="stress_frecuency" item-text="text" item-value="val" outlined></v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <label>¿Cuan activo es el paciente durante su tiempo libre?<br><br></label>
                    <v-select class="mt-3" v-model="vars.free_time_activity" :items="free_time_activity" item-text="text" item-value="val" outlined></v-select>
                  </v-col>
                </v-row>
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="12">
                <p class="text-h6 text-center font-weight-bold">Factores Dietético</p>
                <v-row>
                  <v-col cols="12" md="6">
                    <label>¿El paciente consume comida con sal o snacks 1 o 2 veces al día?<br><br></label>
                    <v-select class="mt-3" v-model="vars.salt_snack_food_daily" :items="true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume comida frita, snacks o comida rápida 3 o más veces a la semana?</label>
                    <v-select class="mt-3" v-model="vars.fast_food_weekly" :items="true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume 1 fruta o más veces al día?</label>
                    <v-select class="mt-3" v-model="vars.eat_fruits" :items="true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12" md="6">
                    <label>¿El paciente consume vegetales 1 o más veces al día?</label>
                    <v-select class="mt-3" v-model="vars.eat_vegetables" :items="true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>

                  <v-col cols="12">
                    <label>¿El paciente consume carne o aves 2 o más veces al día?</label>
                    <v-select class="mt-3" v-model="vars.eat_meat" :items="true_false" item-text="text" item-value="val" outlined></v-select>
                  </v-col>
                </v-row>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="calc" outlined readonly required ></v-text-field>
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
                            <td v-if="item.region != 'Ámerica del Sur'">{{ item.factor }}</td>
                            <td v-else>0.7</td>
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