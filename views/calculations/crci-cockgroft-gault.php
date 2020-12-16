    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmula CrCI Cockroft - Gault</h2>
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
                <v-text-field class="mt-3" v-model="calc.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="calc.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>

              <v-col cols="12" md="6">
                <label>Peso</label>
                <v-text-field class="mt-3" v-model="calc.weight" :counter="7" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Suero de creatinina</label>
                <v-text-field class="mt-3" v-model="calc.creatinine_serum" :counter="7" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-btn class="white--text secondary" block rounded>Obtener resultado</v-btn>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center result-label">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col>

            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>