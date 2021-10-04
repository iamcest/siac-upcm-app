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
							<h1 class="text-center text-h5 mt-4">Suite de Trabajo</h1>
						  <v-form class="px-10">

					      <v-row>
					        <v-col cols="12" md="12" >
					        	<span>Correo electrónico</span>
					          <v-text-field type="email" name="email" v-model="email" outlined required ></v-text-field>

					        	<label for="">Contraseña</label>
					          <v-text-field type="password" name="password" v-model="password"  v-on:keyup.enter="login" outlined required ></v-text-field>
					          <v-row class="d-flex justify-end mb-4">
						          <v-btn  @click="dialog = true" text>¿Olvidaste tu contraseña?</v-btn>
					          </v-row>
					          <div class="d-flex flex-column justify-space-between align-center mb-5">
						          <v-btn class="grey white--text py-5" :loading="loading" :disabled="email == '' || password == ''" v-on:click="login" rounded>Iniciar Sesión</v-btn>
						        </div>
						        <?php echo new Template('components/password_reset') ?>
						        <?php echo new Template('components/alert') ?>
					        </v-col>

					      </v-row>

						  </v-form>
		        </v-sheet>
		      </v-col>
	     	</v-row>
	    </v-container>
	  </v-main>
