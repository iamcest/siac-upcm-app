    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula del Criterio de Voltaje de Cornell</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" :items="patients" item-text="name" item-value="id" outlined ></v-select>
              </v-col>

              <v-col cols="12" md="4">
                <label>Género</label>
                <v-select class="mt-3" v-model="calc.cornell.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="4">
                <label>Onda R aVL</label>
                <v-text-field class="mt-3" v-model="calc.cornell.wave_r_avl" :counter="5" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4">
                <label>Onda S V3</label>
                <v-text-field class="mt-3" v-model="calc.cornell.wave_s_v3" :counter="5" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="calcC" outlined readonly required ></v-text-field>
              </v-col>  

              <v-col cols="12">
                <p class="text-center mb-10">Es positivo para HVI si es mayor de <strong>20mm</strong> en mujeres o mayor de <strong>28mm</strong> en hombres.</p>
                <v-divider></v-divider>
              </v-col>

            </v-row>
          </v-form>
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula del Criterio de Sokolow / Lyon.</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">


              <v-col cols="12" md="6">
                <label>Onda S VI</label>
                <v-text-field type="number" class="mt-3" v-model="calc.sokolow_lyon.wave_s_v6" :counter="5" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Onda R V5 o V6</label>
                <v-text-field type="number" class="mt-3" v-model="calc.sokolow_lyon.wave_r_v5" :counter="5" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center d-flex justify-center">Resultado</label>
                <v-text-field class="mt-3 result-box" :value="calcSL" outlined readonly></v-text-field>
              </v-col>  

              <v-col cols="12">
                <p class="text-center mb-10">Se diagnostica HVI cuando la suma es mayor de <strong>35mm</strong></p>
              </v-col>

            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>