
    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">varsuladora de Riesgo OMS / OPS</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" :items="patients" item-text="name" item-value="id" outlined ></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>Edad</label>
                <v-text-field class="mt-3" v-model="vars.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="vars.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="6">
                <label>Tabaquismo</label>
                <v-select class="mt-3" v-model="vars.smoking" :items="true_false" item-text="text" item-value="val" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Presión máxima (sistólica)</label>
                <v-select class="mt-3" v-model="vars.max_pressure" :items="mp" item-text="text" item-value="val" suffix="mmHg" outlined ></v-select>
              </v-col>              

              <v-col cols="12" md="6">
                <label>Diabetes</label>
                <v-select class="mt-3" v-model="vars.diabete" :items="true_false" item-text="text" item-value="val" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Colesterol total (md/dl)</label>
                <v-select class="mt-3" v-model="vars.total_cholesterol" :items="cholesterol" item-text="text" item-value="val" suffix="md/dl" outlined ></v-select>
              </v-col>

              <v-col cols="12">
                <v-btn class="white--text secondary" @click="calc" block rounded>Calcular Riesgo Cardiovascular</v-btn>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="result" outlined readonly required ></v-text-field>
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