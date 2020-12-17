    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Configurar Correo</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12">
                <label>Servidor de correo</label>
                <v-select v-model="form.email_service" class="mt-3" :items="email_servers" item-text="text" item-value="val" outlined ></v-select>
              </v-col>
              <v-col cols="12" md="6">
                <label>Correo electrónico</label>
                <v-text-field type="email" name="email" v-model="form.email" class="mt-3" :counter="60" outlined required ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <label>Contraseña</label>
                <v-text-field name="password" v-model="form.password" class="mt-3" :counter="20" outlined required ></v-text-field>
              </v-col>
              <v-btn class="white--text secondary" :disabled="no_valid" :loading="loading" v-on:click="store" rounded block>Actualizar información</v-btn>
              <?php echo new Template('components/alert') ?>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>