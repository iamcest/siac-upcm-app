    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Mi Perfil</h2>
            </v-col>
            
            <v-col cols="12" md="12">
              <div class="d-flex justify-center">
                <v-icon class="avatar-image">mdi-account-circle</v-icon>
              </div>
            </v-col>
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="4">
                <label>Nombre</label>
                <v-text-field class="mt-3" :counter="60" outlined required ></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>Apellido</label>
                <v-text-field class="mt-3" :counter="60" outlined required ></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>Rol</label>
                <v-text-field class="mt-3" hint="Este campo no puede ser modificado" value="Doctor" persistent-hint outlined readonly required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>Fecha de nacimiento</label>
                <v-menu ref="menu" v-model="menu" :close-on-content-click="false" :return-value.sync="form.birthdate" transition="scale-transition" offset-y min-width="300px">
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field class="mt-3" outlined v-model="form.birthdate" outlined readonly v-bind="attrs" v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="form.birthdate" no-title scrollable>
                    <v-spacer></v-spacer>
                      <v-btn text color="primary" @click="menu = false">
                        Cancelar
                      </v-btn>
                      <v-btn text color="primary" @click="$refs.menu.save(form.birthdate)">
                        OK
                      </v-btn>
                  </v-date-picker>
                </v-menu>
              </v-col>
              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" :items="genders" item-text="gender" item-value="abbr" outlined ></v-select>
              </v-col>


              <v-col cols="12" md="6">
                <label>Correo electrónico</label>
                <v-text-field class="mt-3" :counter="60" outlined required ></v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <label>Télefono</label>
                <v-text-field class="mt-3" :counter="20" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="4">
                <label>Plataformas de comunicación</label>
                <v-row class="pt-0">
                  <v-col cols="4" class="whatsapp-platform">
                    <v-checkbox v-model="form.platforms.whatsapp" prepend-icon="mdi-whatsapp" ></v-checkbox>
                  </v-col>
                  <v-col cols="4" class="telegram-platform">
                    <v-checkbox v-model="form.platforms.telegram" prepend-icon="mdi-telegram" ></v-checkbox>
                  </v-col>
                  <v-col cols="4" class="sms-platform">
                    <v-checkbox v-model="form.platforms.sms" prepend-icon="mdi-comment-text" ></v-checkbox>

                  </v-col>
                </v-row>
              </v-col>
              <v-col cols="12" md="4">
                <label>Contraseña</label>
                <v-text-field class="mt-3" :counter="20" outlined required ></v-text-field>
              </v-col>
              <v-col cols="12" md="4">
                <label>Confirmar contraseña</label>
                <v-text-field class="mt-3" :counter="20" outlined required ></v-text-field>
              </v-col>
              <v-btn class="white--text secondary" rounded block>Actualizar información</v-btn>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>