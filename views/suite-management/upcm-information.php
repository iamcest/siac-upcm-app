    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Información de la UPCM</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col class="" cols="12" md="3" lg="2">
                <v-icon class="d-flex justify-content-center px-2 logo-icon grey--text text--lighten-1">mdi-image</v-icon>
                <v-btn class="secondary white--text" rounded block><v-icon left>mdi-upload</v-icon> Subir logo</v-btn>
              </v-col>   

              <v-col cols="12" md="9" lg="10">
                <label>Nombre</label>
                <v-text-field class="mt-3 mb-4" v-model="upcm_name" :counter="100" outlined required ></v-text-field>
                <p><span class="font-weight-bold">Clave de unidad certificada:</span> {{ unity_certified_key }}</p>
                <p><span class="font-weight-bold">Pronvicia / País: </span>{{ province }}, {{ country }}</p>
                <p><span class="font-weight-bold">N° de miembros en la UPCM:</span> {{ members }}</p>
              </v-col>   

              <v-col cols="12">
              	<v-btn class="secondary white--text" block rounded>Guardar cambios</v-btn>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>