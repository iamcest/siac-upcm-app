	  <!-- Sizes your content based upon application components -->
	  <v-main class="login-container">

	    <!-- Provides the application the proper gutter -->
	    <v-container fluid>

	      <v-row no-gutters class="align-center login-form-container">
		     	<v-col cols="12" md="4" class="mx-auto mt-auto" >
		        <v-sheet>
		        	<div class="d-flex flex-column justify-space-between align-center mt-5">
						    <v-img
						    	width="70%"
						      src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/public/img/Logo.png"
						    ></v-img>
						  </div>
						  <v-form class="px-10">

					      <v-row>
					        <v-col cols="12" md="12" >
					        	<span class="text-center">Ingrese la contraseña nueva</span>

					        	<label for="">Contraseña</label>
					          <v-text-field type="password" name="password" v-model="password" outlined required ></v-text-field>

					        	<label for="">Confirmar contraseña</label>
					          <v-text-field type="password" name="password_confirm" v-model="password_confirm" outlined required ></v-text-field>
					          <div class="d-flex flex-column justify-space-between align-center mb-5">
						          <v-btn class="grey white--text py-5" :loading="loading" :disabled="password == '' || password_confirm == ''" v-on:click="resetPassword" rounded>Reestablecer contraseña</v-btn>
						        </div>
						        <p class="text-center" color="red" v-if="valid_text != ''">
						        	Ambas contraseñas deben ser iguales para continuar
						        </p>
						        <?php echo new Template('components/alert') ?>
					        </v-col>

					      </v-row>

						  </v-form>
		        </v-sheet>
		      </v-col>
	     	</v-row>
	    </v-container>
	  </v-main>
