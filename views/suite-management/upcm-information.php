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

              <v-col cols="12" md="4" lg="2">


                <v-form class="px-4">
                  <v-icon class="d-flex justify-content-center px-2 logo-icon grey--text text--lighten-1" v-if="upcm.upcm_logo == null">mdi-image</v-icon>
                  <v-row class="d-flex justify-center mb-4">
                    <img :src="'<?php echo SITE_URL ?>/public/img/upcms-logo/' + upcm.upcm_logo"  v-if="upcm.upcm_logo != null && !upload_button" width="100%">
                    <div class="d-block" v-if="upload_button">
                      <img :src="previewImage" width="100%">
                    </div>
                  </v-row>
                  <v-row class="d-block">
                    <label for="upcm_logo">
                      <p class="secondary white--text py-2 px-2 rounded-pill cursor-pointer text-center"><v-icon class="white--text" left>mdi-upload</v-icon>Subir logo</p>
                      <input type="file" name="upcm_logo" id="upcm_logo" class="d-none" v-on:change="prevImage"/>  
                    </label>
                  </v-row>
                  <v-row class="mt-2" v-if="upload_button">
                    <v-btn class="primary white--text" v-on:click="uploadImage" :loading="image_loading" block>Guardar logo</v-btn> 
                  </v-row>
                </v-form>
              </v-col>   

              <v-col cols="12" md="8" lg="10">
                <label>Nombre</label>
                <v-text-field class="mt-3 mb-4" v-model="upcm.upcm_name" :counter="60" outlined required ></v-text-field>
                <p><span class="font-weight-bold">Clave de unidad certificada:</span> {{ upcm.upcm_key }}</p>
                <p><span class="font-weight-bold">Pronvicia / País: </span>{{ upcm.upcm_state }}, {{ upcm.upcm_country }}</p>
                <p><span class="font-weight-bold">N° de miembros en la UPCM:</span> {{ upcm.members }}</p>
              </v-col>   

              <v-col cols="12">
              	<v-btn class="secondary white--text" :loading="loading" v-on:click="save_name" block rounded>Actualizar nombre</v-btn>
                <?php echo new Template('components/alert') ?>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>